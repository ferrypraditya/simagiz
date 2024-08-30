<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
	public $user_level;
	public $user_group;
	public $username;
	public $nama;
	public $shift;
	public $id_t;
	public $qt;
	function __construct()
	{
		parent::__construct();
		$this->id_t = $this->input->get('api');
		$query = $this->s_model->s_access($this->id_t);
		$query = $query->row();
		if ($query->user_group == 'Admin') {
			$this->nama = $query->nama;
			$this->username = $query->username;
			$this->user_level = $query->user_level;
			$this->user_group = $query->user_group;
			$this->shift = $query->shift;
			$this->qt = $this->db->get('tbl_title', 1)->row();
		} else {
			$this->id_t = false;
		}
	}

	public function index()
	{
		$url = $this->input->post('url');
		$table = $this->input->post('table');
		$nav = $this->input->post('nav');
		$menuid = $this->input->post('menuid');
		$get_o = $this->db->get_where('tbl_menu_user', array('menuid' => $menuid, 'username' => $this->username), 1)->row();
		$data_field = $this->db->field_data($table);
		$data = array(
			'table' => $table,
			'nav' => $nav,
			'url' => $url,
			'menuid' => $menuid,
			'get_o' => $get_o,
			'data_field' => $data_field,
		);
		$this->load->view('element/wrapper', $data);
		$this->load->view('admin/table/system', $data);
	}
	public function ms()
	{
		$url = $this->input->post('url');
		$table = $this->input->post('table');
		$nav = $this->input->post('nav');
		$menuid = $this->input->post('menuid');
		$get_o = $this->db->get_where('tbl_menu_user', array('menuid' => $menuid, 'username' => $this->username), 1)->row();
		$data_field = $this->db->field_data($table);	
		$data = array(
			'table' => $table,
			'nav' => $nav,
			'url' => $url,
			'menuid' => $menuid,
			'get_o' => $get_o,
			'data_field' => $data_field,
		);
		$this->load->view('element/wrapper', $data);
		$this->load->view('admin/table/master', $data);
	}
	public function bk()
	{
		$db2 = $this->load->database('backup', TRUE);
		$url = $this->input->post('url');
		$table = $this->input->post('table');
		$nav = $this->input->post('nav');
		$menuid = $this->input->post('menuid');
		$get_o = $this->db->get_where('tbl_menu_user', array('menuid' => $menuid, 'username' => $this->username), 1)->row();
		$data_field = $db2->field_data($table);
		$data = array(
			'table' => $table,
			'nav' => $nav,
			'url' => $url,
			'menuid' => $menuid,
			'get_o' => $get_o,
			'data_field' => $data_field,
		);
		$this->load->view('element/wrapper', $data);
		$this->load->view('admin/table/backup', $data);
	}
	public function pl()
	{
		$url = $this->input->post('url');
		$table = $this->input->post('table');
		$nav = $this->input->post('nav');
		$menuid = $this->input->post('menuid');
		$get_o = $this->db->get_where('tbl_menu_user', array('menuid' => $menuid, 'username' => $this->username), 1)->row();
		$data_field = $this->db->field_data($table);
		$data = array(
			'table' => $table,
			'nav' => $nav,
			'url' => $url,
			'menuid' => $menuid,
			'get_o' => $get_o,
			'data_field' => $data_field,
		);
		$this->load->view('element/wrapper', $data);
		$this->load->view('admin/table/planning', $data);
	}
	public function ts()
	{
		$url = $this->input->post('url');
		$table = $this->input->post('table');
		$nav = $this->input->post('nav');
		$menuid = $this->input->post('menuid');
		$get_o = $this->db->get_where('tbl_menu_user', array('menuid' => $menuid, 'username' => $this->username), 1)->row();
		$data_field = $this->db->field_data($table);
		if($table=='tbl_mis_conf'){
			$data_field = $this->db->field_data('tbl_mis_posting');
		}
		$data = array(
			'table' => $table,
			'nav' => $nav,
			'url' => $url,
			'menuid' => $menuid,
			'get_o' => $get_o,
			'data_field' => $data_field,
		);
		$this->load->view('element/wrapper', $data);
		$this->load->view('admin/table/transaction', $data);
	}

	function clearid()
	{
		$table = $this->input->post('table');
		$bk = $this->input->post('bk');
		if ($bk == 'bk') {
			$db2 = $this->load->database('backup', TRUE);
			//$db2->truncate($table);
			$db2->query("ALTER TABLE ".$table." DROP id");
         	$db2->query("ALTER TABLE ".$table."  ADD id INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (id)");
		} else {
			$this->db->query("ALTER TABLE ".$table." DROP id");
         	$this->db->query("ALTER TABLE ".$table."  ADD id INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (id)");
		}
	}
	function formupdateview(){
    		$pos_picking=$this->input->post('pos_picking');
    		$qb=$this->db->query("SELECT * from tbl_m_boxpicking WHERE pos_picking='".$pos_picking."' limit 1")->row();
    		 for($x=$qb->min_box_no;$x<=$qb->max_box_no;$x++){
    		 	$qm=$this->db->query("SELECT * from tbl_view_box WHERE pos_picking='".$pos_picking."' and box_no='".$x."' limit 1")->row();
				if(empty($qm)){
	    		 	$this->db->query("INSERT INTO tbl_view_box (pos_picking,box_no,col,row) VALUES ('".$pos_picking."','".$x."', '".$x."','".$x."')");
	    		 }
	    	}
    		$qm=$this->db->query("SELECT * from tbl_view_box WHERE pos_picking='".$pos_picking."' order by col,row asc")->result();
			$data=array(
			'pos_picking'=>$pos_picking,
			'qb'=>$qb,
			'qm'=>$qm
			);		
	  $this->load->view('admin/form/formupdateview',$data);
	}
	function submitkor(){
        $data = array ('success' => false, 'messages' => array()); 
        $pos_picking=$this->input->post('pos_picking');            
        $box_no=$this->input->post('box_no');
        $col=$this->input->post('col');
        $row=$this->input->post('row'); 
		$this->form_validation->set_rules('box_no', 'box_no', 'trim|required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			 $this->db->query("DELETE FROM tbl_view_box WHERE pos_picking='".$pos_picking."' and box_no=0");
			$qm=$this->db->query("SELECT * from tbl_view_box WHERE pos_picking='".$pos_picking."' and box_no='".$box_no."' limit 1")->row();
			if(empty($qm)){
				$d1= array(
						'pos_picking'=>$pos_picking,
						'box_no'=>$box_no,
						'col'=>$col,
						'row'=>$row,
			    );			
				$this->db->insert('tbl_view_box',$d1); 
			}else{
				$this->db->query("UPDATE tbl_view_box set col='".$col."',row='".$row."',update_time=now(),update_by='".$this->nama."' WHERE id='".$qm->id."'");
			}
			
			$data['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
			 	$data['messages'][$key] = form_error($key);
			}			

		}
		echo json_encode($data);	
    }
function formupdateviewqc(){
    	    $seat_part_no=$this->input->post('seat_part_no');
    		$qb=$this->db->query("SELECT * from tbl_m_partqc WHERE seat_part_no='".$seat_part_no."' limit 1")->row();
    		 for($x=$qb->min_problem_no;$x<=$qb->max_problem_no;$x++){
    		 	$qm=$this->db->query("SELECT * from tbl_view_partqc WHERE seat_part_no='".$seat_part_no."' and problem_no='".$x."' limit 1")->row();
				if(empty($qm)){
	    		 	$this->db->query("INSERT INTO tbl_view_partqc (seat_part_no,problem_no,col,row) VALUES ('".$seat_part_no."','".$x."', '".$x."',1)");
	    		 }
	    	}
    		$qm=$this->db->query("SELECT * from tbl_view_partqc WHERE seat_part_no='".$seat_part_no."' order by col,row asc")->result();
			$data=array(
			'seat_part_no'=>$seat_part_no,
			'qb'=>$qb,
			'qm'=>$qm
			);		
	  $this->load->view('admin/form/formupdateviewqc',$data);
	}
function submitkorqc(){
        $data = array ('success' => false, 'messages' => array()); 
        $seat_part_no=$this->input->post('seat_part_no');            
        $problem_no=$this->input->post('problem_no');
        $ax=explode('|',$problem_no);
        $col=$this->input->post('col');
        $row=$this->input->post('row'); 
		$this->form_validation->set_rules('problem_no', 'problem_no', 'trim|required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			$this->db->query("DELETE FROM tbl_view_partqc WHERE seat_part_no='".$seat_part_no."' and problem_no=0");		
			if($col<20 and $row<10){
				$d1= array(
						'seat_part_no'=>$seat_part_no,
						'problem_no'=>$ax[0],
						'col'=>$col,
						'row'=>$row,
			    );			
				$this->db->insert('tbl_view_partqc',$d1); 
			}else{
				$this->db->query("UPDATE tbl_view_partqc set col='".$col."',row='".$row."',update_time=now(),update_by='".$this->nama."' WHERE id='".$ax[1]."'");
				if($col==20 and $row==10){
					$this->db->query("DELETE FROM tbl_view_partqc WHERE id='".$ax[1]."'");
				}
			}
			
			$data['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
			 	$data['messages'][$key] = form_error($key);
			}			

		}
		echo json_encode($data);	
    }
function formconfajs(){
	$data=array(
	 'qc2'=>$this->db->get_where('tbl_conf_ajs',array('shop'=>'2'),1)->row(),
	);		
	$this->load->view('admin/form/formconfajs',$data);
	}
function confajs(){
  $shop=$this->input->post('shop');
  $auto=$this->input->post('auto');
  $data2=array(
        'auto'=>$auto,       
    );
  $q=$this->db->update('tbl_conf_ajs',$data2,array('shop'=>$shop));
  if($q){
  	$data['status']=true;
  	$data['msg']='update success';
  }else{
  	$data['status']=false;
  	$data['msg']='update failed';
  }
  echo json_encode($data);

} 
function cutoffship(){
	$shop=$this->input->post('shop');
	$id=$this->input->post('id');
	$q=$this->db->query("SELECT * FROM data_ajs WHERE id='".$id."' limit 1")->row();
	if(!empty($q)){
		$qs=$this->db->query("SELECT * FROM data_shipping WHERE sliporder='".$q->sliporder."' and lifting_no='".$q->lifting_no."' limit 1")->row();

		$qu=$this->db->query("UPDATE data_ajs  set calc_ship_time=now() WHERE shop='".$shop."' and id<'".$q->id."' and calc_ship_time is null");
		$qe=$this->db->query("UPDATE data_ajs  set calc_ship_time=null WHERE  shop='".$shop."' and id>='".$q->id."'");
			if($qu and $qe){
				$this->db->query("DELETE FROM data_shipping WHERE shop='".$shop."' and id>='".$qs->id."'");
				$this->db->query("UPDATE tbl_m_patterntruck SET status='Active' WHERE shop='".$shop."'");
		        if ($this->agent->is_browser())
		        {
		                $agent = $this->agent->browser().' '.$this->agent->version();
		        }
		        elseif ($this->agent->is_robot())
		        {
		                $agent = $this->agent->robot();
		        }
		        elseif ($this->agent->is_mobile())
		        {
		                $agent = $this->agent->mobile();
		        }
		        else
		        {
		                $agent = 'Unidentified User Agent';
		        }
			        $dc=$agent.$this->agent->platform().$this->input->ip_address();
			    
					$data2=array(
						'line'=>0,
						'pos'=>'SHIP-'.$this->nama,
						'qrcode'=>$q->sliporder."#".$q->lifting_no,
						'device'=>$dc,
						'cutoff_time'=>gmdate('Y-m-d H:i:s',time()+60*60*7)
					);
					$this->db->insert('tbl_h_cutoff',$data2);
				  $data['status']=true;
			}else{
				$data['status']='Cutoff failed';
			}
		
    }else{
    	$data['status']='Error, Lifting tidak ditemukan';
    }
	    
		echo json_encode($data);
	}
function formaddseat(){
    	$qseat=$this->db->group_by(array("seat_code", "side"));
			$qseat=$qseat->get('tbl_m_seat')->result();
			$data=array(
			'qseat'=>$qseat,
			);		
	  $this->load->view('admin/form/formaddseat',$data);
	}

	function addseat(){
        $itemx = $this->input->post('item');
        $suffix = strtoupper($this->input->post('suffix'));
        $data = array ('success' => false, 'messages' => array()); 
       
		$this->form_validation->set_rules('suffix', 'suffix', 'trim|required|callback_ceksfxadd');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			if($itemx=='All'){
				$qm=$this->db->query("SELECT * from tbl_m_seat WHERE suffix_master like '%".$suffix."%' and status='Active' order by seat_code,side desc ")->result();
			}else{
				$itemx=explode('_', $itemx);
				$seat_code=$itemx[0];
				$side=$itemx[1];
				$qm=$this->db->query("SELECT * from tbl_m_seat WHERE seat_code='".$seat_code."' and side='".$side."'  and suffix_master like '%".$suffix."%' and status='Active' order by seat_code,side desc ")->result();
			}
	        
			$cekhs=$this->db->query("SELECT id,lifting_no from tbl_h_assy WHERE lifting_no like '%K-%' order by id desc limit 1")->row();

			$lift=intval(str_replace('K','', $cekhs->lifting_no))+1;
	    $hour= intval(gmdate('H',time()+60*60*7));
			$menit= intval(gmdate('i',time()+60*60*7));
			$cek=($hour*60)+$menit;
			if($cek>=440 AND $cek<1260){ 
  				$shift="Day";
  			}else{
  				$shift='Night';
  			}
			$prod_id=gmdate('ymdis',time()+60*60*7);
			
			$tgl=gmdate('Y-m-d',time()+60*60*7);
			foreach ($qm as $cekm) {
				 if($lift==10000 OR $lift==''){
		       	  	$lift=1;
		       	  }
          if($lift<10){
	        $lifting_no='K000'.$lift;
          }elseif ($lift>=10 and $lift<100) {
            $lifting_no='K00'.$lift;
          }elseif ($lift>=100 and $lift<1000) {
            $lifting_no='K0'.$lift;
          }else{
            $lifting_no='K'.$lift;
          }
				$qrcode=$cekm->part_no.'|'.$suffix.'|'.$lifting_no.'|'.$prod_id.'|'.$cekm->seat_code.'|'.$cekm->side.'|'.$cekm->code.'|'.$cekm->model.'|'.$cekm->line_no.'|'.$tgl;
				$data2=array(
					'prod_date'=>date('Y-m-d',strtotime('-1 days',strtotime($tgl))),
					'prod_shift'=>$shift,
					'prod_hour'=>gmdate('H',time()+60*60*7),
					'line_no'=>$cekm->line_no,
					'lifting_no'=>$lifting_no,
					'suffix'=>$suffix,
					'model'=>$cekm->model,
					'grade'=>$cekm->grade,
					'variant1'=>$cekm->variant1,
					'variant2'=>$cekm->variant2,
					'variant3'=>$cekm->variant3,
					'variant4'=>$cekm->variant4,
					'seat_code'=>$cekm->seat_code,
					'side'=>$cekm->side,
					'code'=>$cekm->code,
					'part_no'=>$cekm->part_no,
					'qrcode'=>$qrcode,										
					'assy_start'=>date('Y-m-d H:i:s',strtotime('-40 Minutes',strtotime($tgl))),
					'assy_center1'=>date('Y-m-d H:i:s',strtotime('-35 Minutes',strtotime($tgl))),
					'assy_center2'=>date('Y-m-d H:i:s',strtotime('-30 Minutes',strtotime($tgl))),
					'seat_belt'=>null,
					'qc_start'=>date('Y-m-d H:i:s',strtotime('-20 Minutes',strtotime($tgl))),
					'qc_center'=>date('Y-m-d H:i:s',strtotime('-20 Minutes',strtotime($tgl))),
					'takt_time'=>1,
					'durasi'=>1,
					'status'=>'OK'
				);
				$this->db->insert('tbl_h_assy',$data2);
		    $this->logdate('createtbl_h_assy', $qrcode,$this->nama);
				$lift=$lift+1;
				}
			$data['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
			 	$data['messages'][$key] = form_error($key);
			}			

		}
	echo json_encode($data);	
    }
 public function ceksfxadd(){
    $suffix=strtoupper($this->input->post('suffix'));
		$itemx=$this->input->post('item');
		$csfx=$this->db->query("SELECT * from tbl_m_seat WHERE suffix_master like '%".$suffix."%' limit 1")->row();
		if($itemx=='All'){
			$non=$this->db->query("SELECT * from tbl_m_seat WHERE suffix_master like '%".$suffix."%' and status='Non Active' limit 1")->row();
			$qm=$this->db->query("SELECT * from tbl_m_seat WHERE suffix_master like '%".$suffix."%' and status='Active' order by seat_code,side desc ")->result();
		}else{
			$itemx=explode('_', $itemx);
			$seat_code=$itemx[0];
			$side=$itemx[1];
			$non=$this->db->query("SELECT * from tbl_m_seat WHERE seat_code='".$seat_code."' and side='".$side."'  and suffix_master like '%".$suffix."%' and status='Non Active' limit 1")->row();
			$qm=$this->db->query("SELECT * from tbl_m_seat WHERE seat_code='".$seat_code."' and side='".$side."'  and suffix_master like '%".$suffix."%' and status='Active' order by seat_code,side desc ")->result();
		}
        if(empty($csfx)){
        	$this->form_validation->set_message('ceksfxadd', 'Suffix belum terdaftar di master seat!');
            return FALSE;
        }elseif(!empty($non) and empty($qm)){
        	$this->form_validation->set_message('ceksfxadd', 'Suffix Non Active!');
            return FALSE;
        }elseif(empty($qm)){
        	$this->form_validation->set_message('ceksfxadd', 'Item dan Suffix tdk sesuai!');
            return FALSE;
        }else{
	        return true;
        } 
    }
function formtestplc(){
    		$xx=substr(trim($this->input->post('plc_name')),0,2);
    		$qp=$this->db->query("SELECT * FROM tbl_m_plc WHERE id='".$this->input->post('id')."' limit 1")->row();
    		if($xx=='RM'){
					$qseat=$this->db->group_by(array("seat_code", "side"))->get('tbl_m_seat')->result();	
    		}else{
    			$ql=$this->db->query("SELECT * FROM tbl_pos WHERE pos_level='".$this->input->post('pos')."' limit 1")->row();
					$qseat=$this->db->group_by(array("seat_code", "side"))->get_where('tbl_m_seat',array('line_no'=>$ql->line_no))->result();
    		}
			$data=array(
			'id'=>$this->input->post('id'),
			'ip'=>$this->input->post('ip'),
			'pos'=>$this->input->post('pos'),
			'qseat'=>$qseat,
			'qp'=>$qp,
			);		
	  $this->load->view('admin/form/formtestplc',$data);
	}
function testplc(){
      $itemx = $this->input->post('item');
      $itemx=explode('_', $itemx);
			$seat_code=$itemx[0];
			$side=$itemx[1];
      $id = $this->input->post('id');
      $suffix = $this->input->post('suffix');
      $data = array ('success' => false, 'messages' => array()); 
       
		$this->form_validation->set_rules('suffix', 'suffix', 'trim|required|callback_ceksfxadd|callback_cekmplc');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
	        $key=$this->db->get_where('tbl_m_plc',array('id'=>$id),1)->row();
	        $cekm=$this->db->query("SELECT * from tbl_m_seat WHERE seat_code='".$seat_code."' and side='".$side."' and suffix_master like '%".$suffix."%' limit 1")->row();
	        $part_no=implode('-', array_slice(explode('-',$cekm->part_no), 0, 2));
	        $this->db->query("DELETE FROM temp_plc WHERE pos='".$key->pos."' and status!='complete'");
		       if(substr($key->plc_name,0,2)=='RM'){        	
		        	$mplc=$this->db->like('part_no',$part_no)->get('tbl_m_matrixplcrm',1)->row();
		       }else{
		        	$mplc= $this->db->query("SELECT * FROM tbl_m_matrixplc WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and suffix_master like '%".$suffix."%' limit 1")->row();
		       }
					$dataplc= array(
						'ip_address'=>$key->ip_address,
						'station_no'=>$key->station_no,
						'pos'=>$key->pos,
						'plc_name'=>$key->plc_name,
						'keyjss'=>$part_no.'|'.$suffix.'|0001|'.gmdate('YmdH',time()+60*60*7),
						'tipe_data'=>$key->tipe_data,
						'reg1'=>$key->reg1,
						'reg2'=>$key->reg2,
						'reg3'=>$key->reg3,
						'reg4'=>$key->reg4,
						'reg5'=>$key->reg5,
						'reg6'=>$key->reg6,
						'data1'=>1,
						'data2'=>$mplc->plc_code,
						'data3'=>$key->data3,
						'data4'=>$key->data4,
						'data5'=>$key->data5,
						'data6'=>$key->data6,
						'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
						'status'=>'put',
				    );        
			
			$q=$this->db->insert('temp_plc',$dataplc); 
			if($q){
				$data['success'] = true;
			}else{
				$data['messages']['suffix'] = 'input data plc failed';
			}
			
		} else {
			foreach ($_POST as $key => $value) {
			 	$data['messages'][$key] = form_error($key);
			}			

		}
	echo json_encode($data);	
 }
 public function cekmplc(){
    $itemx = $this->input->post('item');
    $itemx=explode('_', $itemx);
		$seat_code=$itemx[0];
		$side=$itemx[1];
  	$suffix=$this->input->post('suffix');
  	$id = $this->input->post('id');
  	$key=$this->db->get_where('tbl_m_plc',array('id'=>$id),1)->row();
		$cekm=$this->db->query("SELECT * from tbl_m_seat WHERE seat_code='".$seat_code."' and side='".$side."' and suffix_master like '%".$suffix."%' limit 1")->row();
	    $part_no=implode('-', array_slice(explode('-',$cekm->part_no), 0, 2));
      if(substr($key->plc_name,0,2)=='RM'){
      	$mplc=$this->db->like('part_no',$part_no)->get('tbl_m_matrixplcrm',1)->row();
      }else{
      	$mplc= $this->db->query("SELECT * FROM tbl_m_matrixplc WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and suffix_master like '%".$suffix."%' limit 1")->row();
      }
      if(empty($mplc)){
      	$this->form_validation->set_message('cekmplc', 'Matrix PLC Empty!');
          return FALSE;
      }else{
        	return true;
      } 
    }
  function logdate ($action,$values,$nama){
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $dc=$agent.$this->agent->platform().$this->input->ip_address();
         $data=array(
            'action'=>$action,
            'data'=>$values,
            'device'=>$dc,
            'update_by'=>$nama,
            'update_time'=>gmdate('Y-m-d H:i:s',time()+60*60*7)
            );
        $this->db->insert('tbl_logdate',$data);

    }
}