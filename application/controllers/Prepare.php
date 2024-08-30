<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Prepare extends CI_Controller{
	public $nama;
	public $user_level;
	public $ip;
	public $shift;
 	public $id_t;
 	public $idcard;
  function __construct(){
     parent::__construct();
     $this->load->library('user_agent');
     $this->ip=$this->input->ip_address();
     $this->id_t=$this->input->get('api');
	$query=$this->s_model->s_access($this->id_t);
     $query=$query->row();                      
     if(!empty($query)){	
		$this->nama=$query->nama;
		$this->shift=$query->shift;
		$this->user_level=$query->user_level;
		$this->idcard=$query->idcard;
	}else{
		$data=array(
	    		'id_t'=>$this->id_t,
	    	);			
		$this->load->view('errors/error');
	}		
     
 }
function index()
	{
		$qt = $this->db->get('tbl_title', 1)->row();
		$qm = $this->db->query("SELECT * FROM data_order order by id asc")->result();
		$data = array(
			'qt' => $qt,
			'qm' => $qm
		);
		$this->load->view('user/prepare/index', $data);
	}
function searchpart(){
    	$po_no = $this->input->get('query');
		$query=$this->db->query("SELECT * FROM tbl_order_customer WHERE po_no LIKE '%".$po_no."%' group by po_no order by id ASC limit 10")->result_array();
		
		foreach($query as $data) {
		    $output[] = [
		        'value' => $data['po_no'],
		        'label'  => $data['po_no']
		    ];
		}

		if (!empty($output) and $po_no!='') {
		    // Encode ke format JSON.
		    echo json_encode($output);
		}else{
			$output[] = [
		        'value' => 'No Data',
		        'label'  => 'No Data'
		    ];
			echo json_encode($output);
		}
    }
function scan(){
		$qt= $this->db->get('tbl_title',1)->row();
		$po_no = $this->input->get('po_no');
		$t=$this->db->get_where('tbl_temp_pulling',array('idcard'=>$this->idcard),1)->row();
		$qm=$this->db->query("SELECT a.*,(a.po_qty-a.pulling) as remain,b.no_box,b.qr_label,b.storage_label FROM tbl_order_customer a left join tbl_master_partlist b on(a.part_no_customer=b.part_no_customer) WHERE a.po_no='".$po_no."' group by a.id order by a.pulling/a.po_qty ASC")->result();
		$qe = $this->db->query("SELECT po_no,customer,sum(po_qty) as po_qty,sum(pulling) as pulling FROM tbl_order_customer WHERE po_no='".$po_no."' limit 1")->row();
		$mis=$this->db->query("SELECT id from tbl_h_misscan WHERE pos_name='Pulling' and scan_by='".$this->nama."' and problem is null order by id desc limit 1")->row();
		$scanstatus='PLEASE SCAN QR LABEL';
		if(!empty($t)){
			if($t->qty_po==$t->qty_scan and $t->qr_label_fsi==''){
				$scanstatus='PLEASE SCAN LBL FSI/NO BOX';
			}else{
				$scanstatus='PLEASE SCAN QR LABEL';
			}
			
		}
		$data=array(
		'qt'=>$qt,
     	'qm'=>$qm,
     	'qe'=>$qe,
     	't'=>$t,
     	'scanstatus'=>$scanstatus,
     	'mis'=>$mis->id
		);	
		
		$this->load->view('user/prepare/scan',$data);	
	}

 function submitscan(){
   $data = array ('status' => false);
	$qrcode =str_replace('$','',trim($this->input->post('qrcode')));
	$qr=explode("#",$qrcode);
	$po_no =$this->input->post('po_no');
	$customer =trim($this->input->post('customer'));
	$qm=$this->db->query("SELECT * FROM tbl_master_partlist WHERE replace(customer,' ','')='".$customer."' and replace(qr_label,' ','')='".str_replace(' ','',$qrcode)."' limit 1")->row();
	$qe=$this->db->get_where('tbl_master_partlist',array('part_no_fsi'=>$qr[1]),1)->row();
	
	if(empty($qe)){
		$ax=explode("_",$qrcode);
		$qe=$this->db->get_where('tbl_master_partlist',array('part_no_fsi'=>$ax[0],'no_box'=>$ax[1]),1)->row();
		if(empty($qe)){
		$qe=$this->db->query("SELECT * FROM tbl_master_partlist WHERE part_no_fsi='".$ax[0]."' and no_box is null limit 1")->row();	
		}
	}
	if($po_no==''){
		$data['status'] ='PLEASE SELECT PO CUSTOMER';  
	}elseif(!empty($qm)){
		$qc=$this->db->get_where('tbl_order_customer',array('po_no'=>$po_no,'part_no_customer'=>$qm->part_no_customer),1)->row();
		$qc1=$this->db->query("SELECT * FROM tbl_order_customer WHERE po_no='".$po_no."' and part_no_customer='".$qm->part_no_customer."' and pulling<po_qty order by id asc limit 1")->row();	
		if(empty($qc)){
			$data['status'] ='MIS SCAN QR LABEL';
		}elseif($qc1->status=='Cancel'){
			$data['status'] =$qc1->part_no_customer.' STATUS CANCEL'; 
		}elseif(empty($qc1)){
			$data['status'] =$qc->part_no_customer.' QTY PULLING FULL';
		}else{
			$t=$this->db->get_where('tbl_temp_pulling',array('idcard'=>$this->idcard),1)->row();
			if(!empty($t) and $t->qr_label==$qrcode and $t->qr_label_fsi==''){
				if($t->scan_qty==$t->po_qty){
					$data['status'] ='SCAN QR LBL COMPLETE,PLEASE SCAN LBL FSI/NO BOX';
				}else{
					$scan_qty=$t->scan_qty+1;
					$data1 = array( 
						"scan_qty" => $scan_qty,
					);
					$this->db->update('tbl_temp_pulling',$data1,array('idcard'=>$this->idcard));
					$data['status'] = 'SUCCESS SCAN';
				}
				
			}else{
				$this->db->delete('tbl_temp_pulling',array('idcard'=>$this->idcard));
				$data1 = array( 
					"idcard"=>$this->idcard,
					"scan_date"=>gmdate('Y-m-d H:i:s',time()+60*60*7),
					"customer" => $qc1->customer,
					"po_no" => $po_no.'|'.$qc1->po_item,
					"qr_label"=>$qrcode,
					"part_no_fsi" => $qm->part_no_fsi,
					"part_no_customer" => $qm->part_no_customer,
					"po_qty" => $qc1->po_qty-$qc1->pulling,
					"scan_qty" => 1,
				);
				$this->db->insert('tbl_temp_pulling',$data1);
				
				$data['status'] = 'SUCCESS SCAN';
			}	
		}
	  }elseif(!empty($qe)){
	  	
	  	$t=$this->db->get_where('tbl_temp_pulling',array('idcard'=>$this->idcard),1)->row();
	  	$xx=explode("|",$t->po_no);
	  	if(empty($t) OR $t->qr_label_fsi!=''){
	  		$data['status'] ='PLEASE SCAN QR LABEL';  
	  	}else{

	  		if($t->part_no_fsi!=$qe->part_no_fsi){
	  			$data2 = array(
			    	"part_no_true"=>$t->part_no_fsi,
			    	"part_no_false"=>$qe->part_no_fsi,
       			    "scan_time"=>gmdate('Y-m-d H:i:s',time()+60*60*7),
					"scan_by"=> $this->nama,
					"pos_name"=> 'Pulling',
   				 );
       			$this->db->insert('tbl_h_misscan',$data2);
	  			$data['status'] ='MIS PULLING';  
	  		}else{
	  			$data2 = array(
			    	"customer"=>$t->customer,
			    	"po_no"=>$xx[0],
			    	"part_no_customer"=>$t->part_no_customer,
			    	"part_no_fsi"=>$t->part_no_fsi,
			    	"part_name"=>$qe->part_name,
			    	"qr_label_customer"=>$t->qr_label,
			    	"qr_label_fsi"=>$qrcode,
			    	"qty"=>$t->scan_qty,
			    	"pos_name"=> 'Pulling',
       				"scan_time"=>gmdate('Y-m-d H:i:s',time()+60*60*7),
					"scan_by"=> $this->nama,
   				 );
       			$q=$this->db->insert('tbl_h_packing',$data2);
       			if($q){
       				$data1 = array( 
							"qr_label_fsi" => $qrcode,
							"part_no_fsi1" => $t->part_no_fsi,
						);
					$this->db->update('tbl_temp_pulling',$data1,array('idcard'=>$this->idcard));
       				$this->db->query("UPDATE tbl_order_customer set pulling=pulling+'".$t->scan_qty."' WHERE po_no='".$xx[0]."' and po_item='".$xx[1]."' and  part_no_customer='".$t->part_no_customer."'");
       				$this->db->query("UPDATE tbl_stock_part set stock=stock-'".$t->scan_qty."',pic_update_out='".$this->nama."',last_update_out=now() WHERE part_no_fsi='".$t->part_no_fsi."'");
       				$data['status'] = 'SUCCESS SCAN';	
       			}else{
       				$data['status'] = 'SCAN FAILED';
       			}

	  		}
	  		
	  	}
	  }else{
	     $data['status'] ='ERROR,CODE NOT FOUND !!';  
	  }	 
	  echo json_encode($data);
 }

 function mis(){
  		$qt= $this->db->get('tbl_title',1)->row();
  		$this->db->select('*');
  		$this->db->from('tbl_h_misscan');
  		$this->db->where('pos_name','Pulling');
  		$this->db->where('scan_by',$this->nama);
  		$this->db->where('problem is NULL',NULL);
  		$this->db->order_by('id','DESC');
  		$this->db->limit(1);
  		$data_mis=$this->db->get();
  		$t=$this->db->get_where('tbl_temp_pulling',array('idcard'=>$this->idcard),1)->row();
		$data=array(
			'qt'=>$qt,
	     	'data_mis'=>$data_mis->row(),
	     	't'=>$t
		);	
		
		$this->load->view('user/prepare/mis',$data);	
	}
 function submitmis(){
 	$this->form_validation->set_rules('problem', 'Problem', 'trim|required');
	$this->form_validation->set_rules('password', 'Password Leader', 'trim|required|callback_cek_pwd');
	$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
	if($this->form_validation->run()) {
		$id=$this->input->post('id');	
		$problem=$this->input->post('problem');
		$p=$this->input->post('password');
		$p = $this->sha1->generate($p);
		$p = strrev($p); $p=substr($p,5);

		$cekuser=$this->db->get_where('tbl_user',array('password'=>$p,'user_level'=>'Leader'),1)->row();
		$this->db->query("UPDATE tbl_h_misscan set problem='".$problem."', leader_time=now(),leader_by='".$cekuser->nama."' WHERE id='".$id."'");			
		$data['success'] = true;

	}else{
		foreach ($_POST as $key => $value) {
		 	$data['messages'][$key] = form_error($key);
		}			

	}
	echo json_encode($data);
 }
 public function cek_pwd(){
		$p=$this->input->post('password');
		$p = $this->sha1->generate($p);
		$p = strrev($p); $p=substr($p,5);
		$cekuser=$this->db->get_where('tbl_user',array('password'=>$p,'user_level'=>'Leader'),1)->row();
            if(!empty($cekuser)){
                    return true;
            }else{
                    $this->form_validation->set_message('cek_pwd', 'Incorrect Password Leader');
                    return FALSE;
            }
    }
function back(){
	$this->db->query("DELETE FROM tbl_temp_pulling WHERE idcard='".$this->idcard."'");
	redirect('home?api='.$this->id_t);
}
function logout(){
	$this->db->query("DELETE FROM tbl_temp_pulling WHERE idcard='".$this->idcard."'");
	redirect('action/logout?api='.$this->id_t);
}
}