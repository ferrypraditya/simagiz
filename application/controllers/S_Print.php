<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class S_Print extends CI_Controller{
	public $user_level;
	public $user_group;
	public $user_area;
	public $nama;
	public $shift;
	public $id_t;
	function __construct(){
        parent::__construct();
        $this->id_t=$this->input->get('api');
        $query=$this->s_model->s_access($this->id_t); 
		$query=$query->row();                     
        $this->nama=$query->nama;
		$this->user_area=$query->user_area;
		$this->user_level=$query->user_level;
		$this->user_group=$query->user_group;
		$this->shift=$query->shift;
    } 
   
	function tbl_user(){
		$id=$this->input->get('id'); 
		$query=$this->db->query("select a.*,b.web_path,c.line_no,c.pos_level from tbl_user a left join files b on(a.image=b.id)  inner join tbl_pos c ON(a.pos_level=c.pos_level) where a.id IN(".$id.") group by a.username");	
        //load content html
        $qt= $this->db->query('select a.*,b.web_path from tbl_title a left join files b on(a.image=b.id) limit 1')->row();
        $data=array(	
						'data_table'=>$query->result(),
						'logo'=>$qt->web_path,
						'owner'=>$qt->owner,
						'title'=>$qt->title,
						'detail'=>$qt->detail,
						'jumlah'=>$query->num_rows(),

						);	
        $this->load->view('print/idcard',$data);
	}
	
	function tbl_soj(){
		$lotid=$this->input->get('lotid'); 
 		$lift_max=$this->db->query("SELECT lifting_no from tbl_history_shipping WHERE lotid='".$lotid."' order by id desc limit 1")->row();
 		$lift_min=$this->db->query("SELECT lifting_no from tbl_history_shipping WHERE lotid='".$lotid."' order by id asc limit 1")->row();
 		$hd_ship=$this->db->query("SELECT calc_time,prod_shift,lotid,shop,trip,count(id) as total,count(distinct(lifting_no)) as totlift from tbl_history_shipping WHERE lotid='".$lotid."' limit 1")->row();
 		$data_ship=$this->db->query("SELECT lotid,idseat,code,item,address,count(id) as total from tbl_history_shipping WHERE lotid='".$lotid."' group by part_no order by address,item,idseat,code asc")->result();
		$data3=array(									
				'lift_max'=>$lift_max->lifting_no,
				'lift_min'=>$lift_min->lifting_no,
				'hd_ship'=>$hd_ship,
				'data_ship'=>$data_ship,
				'print'=>'A',
				);
		$this->load->view('print/kbnshipping',$data3);
	}

	function tbl_specialprod(){
		$lotid=$this->input->get('lotid'); 
		
 		$data_prod=$this->db->query("SELECT a.*,b.suffix_master,b.lot,count(a.id) as plan FROM tbl_calcprod a inner join tbl_master_seat b on(a.part_no=b.part_no) WHERE a.line_no NOT IN (5) and a.lotid='".$lotid."' and b.suffix_master like CONCAT('%',a.suffix,'%') group by line_no,part_no")->result();
 		$data_line=$this->db->query("SELECT a.lotid,a.line_no,a.calc_time,b.takt_time FROM tbl_calcprod a inner join tbl_master_line b ON(a.line_no=b.line_no) WHERE a.line_no NOT IN (5) and a.lotid='".$lotid."' group by a.line_no")->result();
		$data3=array(									
				'data_prod'=>$data_prod,
				'data_line'=>$data_line,
				'print'=>'A',
				);
		$this->load->view('print/kbnbig',$data3);
	}
	function tbl_h_qc(){
	 	$id=$this->input->get('id');
		$qs= $this->db->get_where('tbl_h_qc',array('id'=>$id),1)->row();
		$part_no=implode('-', array_slice(explode('-',$qs->seat_part_no), 0, 2));
		$cseat=$this->db->get_where("tbl_h_assy",array("qrcode"=>$qs->qrcode),1)->row();
		$qr=$this->db->get_where("tbl_h_qc",array("qrcode"=>$qs->qrcode));
	  	$data=array(
	     	'part_no'=>$part_no,
			'cseat'=>$cseat,
			'data_repair'=>$qr->result(),
			'jumlah'=>$qr->num_rows(),
			'print'=>'L',
				);
	 	$this->load->view('print/checksheet',$data);	
	}
	function kbnbig(){
		$lotid=$this->input->get('lotid'); 	
 		$data_prod=$this->db->query("SELECT a.*,b.suffix_master,b.lot,count(a.id) as plan FROM tbl_calcprod a inner join tbl_master_seat b on(a.part_no=b.part_no) WHERE a.lotid='".$lotid."' and b.suffix_master like CONCAT('%',a.suffix,'%') group by a.id order by a.id asc")->result();
 		$data_line=$this->db->query("SELECT a.*,b.takt_time FROM tbl_calcprod a inner join tbl_master_line b ON(a.line_no=b.line_no) WHERE  a.lotid='".$lotid."' group by a.line_no")->result();
		$data3=array(									
				'data_prod'=>$data_prod,
				'data_line'=>$data_line,
				'print'=>'A',
				);
		$this->load->view('print/kbnbig',$data3);
	}
	function tbl_history_airbag(){
		$id=$this->input->get('id');
		$cseat= $this->db->get_where('tbl_history_airbag',array('id'=>$id),1)->result(); 
 		$data3=array(									
				'cseat'=>$cseat,
				'print'=>'A',
				);
		$this->load->view('print/labelairbag',$data3);
	}
	
	function kbnreg(){
		$lotid=$this->input->get('lotid'); 
		$print=$this->input->get('print');
		
 		$data_prod=$this->db->query("SELECT a.*,b.suffix_master,b.lot,count(a.id) as plan FROM tbl_calcprod a inner join tbl_master_seat b on(a.part_no=b.part_no) WHERE a.lotid='".$lotid."' and b.suffix_master like CONCAT('%',a.suffix,'%') group by line_no,part_no")->result();
 		$data_line=$this->db->query("SELECT a.lotid,a.line_no,a.calc_time,b.takt_time FROM tbl_calcprod a inner join tbl_master_line b ON(a.line_no=b.line_no) WHERE a.lotid='".$lotid."' group by a.line_no")->result();
 		$lift_max=$this->db->query("SELECT lifting_no from tbl_history_shipping WHERE lotid='".$lotid."' order by id desc limit 1")->row();
 		$lift_min=$this->db->query("SELECT lifting_no from tbl_history_shipping WHERE lotid='".$lotid."' order by id asc limit 1")->row();
 		$hd_ship=$this->db->query("SELECT calc_time,prod_shift,lotid,shop,trip,count(id) as total,count(distinct(lifting_no)) as totlift from tbl_history_shipping WHERE lotid='".$lotid."' limit 1")->row();
 		$data_ship=$this->db->query("SELECT lotid,idseat,code,item,address,count(id) as total from tbl_history_shipping WHERE lotid='".$lotid."' group by part_no order by address,item,idseat,code asc")->result();
		$data3=array(									
				'lift_max'=>$lift_max->lifting_no,
				'lift_min'=>$lift_min->lifting_no,
				'hd_ship'=>$hd_ship,
				'data_ship'=>$data_ship,
				'data_prod'=>$data_prod,
				'data_line'=>$data_line,
				'print'=>'A',
				);
		$this->load->view('print/kbnreg',$data3);
	}
	function data_shipping(){
      $id=$this->input->get('id');
      $qt=$this->db->query("SELECT * FROM data_shipping WHERE id='".$id."' limit 1")->row();
      $lmin=$this->db->query("SELECT lifting_no FROM data_shipping WHERE shipping_id='".$qt->shipping_id."' order by urutan asc limit 1")->row();
      $lmax=$this->db->query("SELECT lifting_no FROM data_shipping WHERE shipping_id='".$qt->shipping_id."' order by urutan desc limit 1")->row();
      if($qt->sj_time==''){
      	$sj_time=gmdate('Y-m-d H:i:s',time()+60*60*7);
      }else{
      	$sj_time=$qt->sj_time;
      }
       $data=array( 
          'sj_no'=>$qt->sj_no, 
          'qt'=>$qt,
          'prod_date'=>date('d-M-Y',strtotime($sj_time)),       
          'data_table'=>$this->db->query("SELECT *,count(id) as jumlah FROM data_shipping WHERE shipping_id='".$qt->shipping_id."' and qr_seat is not null group by part_no")->result(),
          'qto'=>$this->db->query("SELECT * FROM tbl_m_customer WHERE shop='".$qt->shop."' limit 1")->row(),
          'seqmin'=>$lmin->lifting_no,
          'seqmax'=>$lmax->lifting_no,
          ); 
      
      $this->load->view('print/suratjalan',$data);
}
function reprintdn()
	{
		$lotid = $this->input->get('lotid');
		$so = $this->input->get('so');
		$qt = $this->db->query("SELECT * FROM tbl_history_shipping WHERE lotid='" . $lotid . "' and sliporder='" . $so . "' limit 1")->row();
		$data_table = $this->db->query("SELECT lifting_no, suffix,
		GROUP_CONCAT(if(item_code='FR' and code='RH',job_no,null)) as frrh,
		GROUP_CONCAT(if(item_code='FR' and code='LH',job_no,null)) as frlh,
		GROUP_CONCAT(if(item_code='RR 1' and code='RH',job_no,null)) as r1rh,
		GROUP_CONCAT(if(item_code='RR 1' and code='LH',job_no,null)) as r1lh,
		GROUP_CONCAT(if(item_code='RR 2' and code='RH',job_no,null)) as r2rh,
		GROUP_CONCAT(if(item_code='RR 2' and code='LH',job_no,null)) as r2lh
		FROM tbl_history_shipping WHERE lotid='" . $lotid . "' and sliporder='" . $so . "'  GROUP BY lifting_no ORDER BY urutan,item_code,code ASC")->result();

		$data = array(
			'qt' => $qt,
			'data_table' => $data_table,
		);

		$this->load->view('print/deliverynote', $data);
	}
	function tbl_m_basepallet(){
		$id=$this->input->get('id'); 
		$query=$this->db->query("select * from tbl_m_basepallet where id IN(".$id.") order by id asc");
		
        $data=array(	
				'data_table'=>$query->result(),
				'jumlah'=>$query->num_rows(),
				);	
        $this->load->view('print/pallet',$data);
	}
    function tbl_h_labelprod(){
		$id=$this->input->get('id'); 
 		$query['id']= $this->db->get_where('tbl_h_labelprod',array('id'=>$id))->row();
 		$qr_seat=$query['id']->qr_seat;
		$dataqr=explode('|', $qr_seat);
		$part_no=$dataqr[0];
 		$data_seat=$this->db->get_where('tbl_master_seat',array('part_no'=>$part_no),1)->result();
   
		$data2=array(					
				'data_seat'=>$data_seat,
				'qr_seat'=>$qr_seat,
				're'=>'re',
				);	
		$this->load->view('print/labelprod',$data2);
	}
	function kbnprod_regular(){
		$id=$this->input->get('id');
		$id=$this->input->get('id');
		$qd=$this->db->query("select * from prod_regular where id IN(".$id.") order by id asc limit 1")->row();	
		$qs=$this->db->query("select * from prod_regular where line_no='".$qd->line_no."' and id>='".$qd->id."' order by id asc limit 4")->result();	
        $data=array(	
				'qs'=>$qs,
				'qd'=>$qd,
				'print'=>'X',
				);		
        $this->load->view('print/kbn_big',$data);
	}
	function kbnprod_special(){
		$id=$this->input->get('id');
		$qd=$this->db->query("select * from prod_special where id IN(".$id.") order by id asc limit 1")->row();	
		$qs=$this->db->query("select * from prod_special where line_no='".$qd->line_no."' and id>='".$qd->id."' order by id asc limit 4")->result();	
        $data=array(	
				'qs'=>$qs,
				'qd'=>$qd,
				'print'=>'X',
				);		
        $this->load->view('print/kbn_big',$data);
	}
	function lblprod_regular(){
		$id=$this->input->get('id');
		$qd=$this->db->query("select * from prod_regular where id IN(".$id.") order by id asc")->result();	
        $data=array(	
				'qd'=>$qd
				);		
        $this->load->view('print/label_seat',$data);
	}
	function lblprod_special(){
		$id=$this->input->get('id');
		$qd=$this->db->query("select * from prod_special where id IN(".$id.") order by id asc")->result();	
        $data=array(	
				'qd'=>$qd
				);		
        $this->load->view('print/label_seat',$data);
	}

}
