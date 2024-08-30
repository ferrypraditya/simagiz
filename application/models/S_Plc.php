<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!');
class S_Plc extends CI_Model{
	 function __construct(){
        parent::__construct();
	}
	function saspring($keyjss=NULL,$pos_level=NULL,$pos=NULL,$line_no,$source){
		$data = NULL;
		if($keyjss!=NULL){
			$cekplc= $this->db->query("SELECT * FROM temp_plc WHERE keyjss='".$keyjss."' and pos='".$pos_level."' limit 1")->row();
			$data['subassy']=0;
			$dataqr=explode('|', $keyjss);
			$part_no=implode('-', array_slice(explode('-',$dataqr[0]), 0, 2));
			$suffix=$dataqr[1];
			$lifting=$dataqr[2];
			$lifting=str_replace('S', '',$lifting);
			$cek1= $this->db->query("SELECT * FROM temp_plc WHERE pos='".$pos_level."' and status!='complete' limit 1")->row();
			if(empty($cekplc) and empty($cek1)){
				//inssert plc
				$key=$this->db->get_where('tbl_m_plc',array('pos'=>$pos_level),1)->row();
				$mplc= $this->db->query("SELECT * FROM tbl_m_matrixplc WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and suffix_master like '%".$suffix."%' limit 1")->row();
				if(empty($mplc)){
					$plc_code='Empty';
				}else{
					$plc_code=$mplc->plc_code;
				}
				$this->db->query("DELETE FROM temp_plc WHERE pos='".$pos_level."' and status='put'");
				$data1= array(
						'ip_address'=>$key->ip_address,
						'station_no'=>$key->station_no,
						'pos'=>$key->pos,
						'plc_name'=>$key->plc_name,
						'keyjss'=>$keyjss,
						'tipe_data'=>$key->tipe_data,
						'reg1'=>$key->reg1,
						'reg2'=>$key->reg2,
						'reg3'=>$key->reg3,
						'reg4'=>$key->reg4,
						'reg5'=>$key->reg5,
						'reg6'=>$key->reg6,
						'data1'=>intval($lifting),
						'data2'=>$plc_code,
						'data3'=>$key->data3,
						'data4'=>$key->data4,
						'data5'=>$key->data5,
						'data6'=>$key->data6,
						'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
						'status'=>'put',
			    );
			  
			 		 
			    	 $this->db->insert('temp_plc',$data1);
			    	 //airbag
					$qab=$this->db->query("SELECT * FROM tbl_m_seat WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and airbag!='NO' and suffix_master like '%".$suffix."%' limit 1")->row();					
					if(!empty($qab)){
						$this->db->delete("tbl_h_airbag",array('pos_level'=>$pos_level,'qr_seat'=>$keyjss));
						$dabg=array(
							'scan_time'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
							'pos_level'=>$pos_level,
							'qr_seat'=>$keyjss,
						);
						$this->db->insert('tbl_h_airbag',$dabg);
					}	
			}else{
				$hsabg=$this->db->query("SELECT * FROM tbl_h_airbag WHERE pos_level='".$pos."' and qr_seat='".$cekplc->keyjss."' and qr_airbag is null order by id desc limit 1")->row();
				
				if($cekplc->finish!='' AND empty($hsabg)){
						$data2=array(
							$pos => gmdate('Y-m-d H:i:s',time()+60*60*7),
						 );

						$this->db->update('prod_'.$source, $data2,array('qrcode'=>$keyjss));
						$data3=array(
							'status'=>'complete',
						 );

						$this->db->update('temp_plc', $data3,array('id'=>$cekplc->id));
						$data['subassy']=1;
					
				}
			}
		}
		return $data;
	 }
	function subassy($keyjss=NULL,$pos_level=NULL,$pos=NULL,$line_no,$source){
		$data = NULL;
		if($keyjss!=NULL){
			$cekplc= $this->db->query("SELECT * FROM temp_plc WHERE keyjss='".$keyjss."' and pos='".$pos_level."' limit 1")->row();
			$data['subassy']=0;
			$dataqr=explode('|', $keyjss);
			$part_no=implode('-', array_slice(explode('-',$dataqr[0]), 0, 2));
			$suffix=$dataqr[1];
			$lifting=$dataqr[2];
			$lifting=str_replace('S', '',$lifting);
			$cek1= $this->db->query("SELECT * FROM temp_plc WHERE pos='".$pos_level."' and status!='complete' limit 1")->row();
			if(empty($cekplc) and empty($cek1)){
				//inssert plc
				$key=$this->db->get_where('tbl_m_plc',array('pos'=>$pos_level),1)->row();
				$mplc= $this->db->query("SELECT * FROM tbl_m_matrixplc WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and suffix_master like '%".$suffix."%' limit 1")->row();
				if(empty($mplc)){
					$plc_code='Empty';
				}else{
					$plc_code=$mplc->plc_code;
				}
				$this->db->query("DELETE FROM temp_plc WHERE pos='".$pos_level."' and status='put'");
				$data1= array(
						'ip_address'=>$key->ip_address,
						'station_no'=>$key->station_no,
						'pos'=>$key->pos,
						'plc_name'=>$key->plc_name,
						'keyjss'=>$keyjss,
						'tipe_data'=>$key->tipe_data,
						'reg1'=>$key->reg1,
						'reg2'=>$key->reg2,
						'reg3'=>$key->reg3,
						'reg4'=>$key->reg4,
						'reg5'=>$key->reg5,
						'reg6'=>$key->reg6,
						'data1'=>intval($lifting),
						'data2'=>$plc_code,
						'data3'=>$key->data3,
						'data4'=>$key->data4,
						'data5'=>$key->data5,
						'data6'=>$key->data6,
						'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
						'status'=>'put',
			    );
			  
			 		 
			    	 $this->db->insert('temp_plc',$data1);
			}else{
				
				if($cekplc->finish!=''){
						$data2=array(
							$pos => gmdate('Y-m-d H:i:s',time()+60*60*7),
						 );

						$this->db->update('prod_'.$source, $data2,array('qrcode'=>$keyjss));
						$data3=array(
							'status'=>'complete',
						 );

						$this->db->update('temp_plc', $data3,array('id'=>$cekplc->id));
						$data['subassy']=1;
					
				}
			}
		}
		return $data;
	 }
function stopline($keyjss=NULL,$pos_level,$line_no){
	if($keyjss!=NULL){
		//new
		$dataqr=explode('|', $keyjss);
		$lifting=$dataqr[2];
		$lifting=str_replace('S', '',$lifting);
		$qw=$this->WorkModel->worktime($line_no);
		$this->db->query("UPDATE tbl_eff_line SET status='STOP' WHERE prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."'");	
	
		$key=$this->db->get_where('tbl_m_plc',array('pos'=>$pos_level),1)->row();
		if(!empty($key)){
			$dataplc= array(
				'ip_address'=>$key->ip_address,
				'station_no'=>$key->station_no,
				'pos'=>$key->pos,
				'plc_name'=>$key->plc_name,
				'keyjss'=>$keyjss,
				'tipe_data'=>'stop',
				'reg1'=>$key->reg1,
				'reg2'=>$key->reg2,
				'reg3'=>$key->reg3,
				'reg4'=>$key->reg4,
				'reg5'=>$key->reg5,
				'reg6'=>$key->reg6,
				'data1'=>intval($lifting),
				'data2'=>1,
				'data3'=>$key->data3,
				'data4'=>$key->data4,
				'data5'=>$key->data5,
				'data6'=>$key->data6,
				'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
				'status'=>'put',
	    	);
				$this->db->insert('temp_plc',$dataplc); 
		}
		

	}
}
function startline($keyjss=NULL,$pos_level,$line_no){
	if($keyjss!=NULL){
		$qw=$this->WorkModel->worktime($line_no);
		$dataqr=explode('|', $keyjss);
		$part_no=implode('-', array_slice(explode('-',$dataqr[0]), 0, 2));
		$suffix=$dataqr[1];
		$lifting=$dataqr[2];
		$lifting=str_replace('S', '',$lifting);
		//new
		$this->db->query("UPDATE tbl_eff_line SET status='RUNNING' WHERE prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."'");

		$key=$this->db->get_where('tbl_m_plc',array('pos'=>$pos_level),1)->row();
		if(!empty($key)){
			$mplc= $this->db->query("SELECT * FROM tbl_m_matrixplc WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and suffix_master like '%".$suffix."%' limit 1")->row();
			if(empty($mplc)){
				$plc_code='Empty';
			}else{
				$plc_code=$mplc->plc_code;
			}
			$dataplc= array(
				'ip_address'=>$key->ip_address,
				'station_no'=>$key->station_no,
				'pos'=>$key->pos,
				'plc_name'=>$key->plc_name,
				'keyjss'=>$keyjss,
				'tipe_data'=>'start',
				'reg1'=>$key->reg1,
				'reg2'=>$key->reg2,
				'reg3'=>$key->reg3,
				'reg4'=>$key->reg4,
				'reg5'=>$key->reg5,
				'reg6'=>$key->reg6,
				'data1'=>intval($lifting),
				'data2'=>$plc_code,
				'data3'=>$key->data3,
				'data4'=>$key->data4,
				'data5'=>$key->data5,
				'data6'=>$key->data6,
				'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
				'status'=>'put',
	    	);
			$this->db->insert('temp_plc',$dataplc);
		}
	}
}
function pokayoke($keyjss=NULL,$pos_level,$line_no){
	if($keyjss!=NULL){
		$dataqr=explode('|', $keyjss);
		$part_no=implode('-', array_slice(explode('-',$dataqr[0]), 0, 2));
		$suffix=$dataqr[1];
		$lifting=$dataqr[2];
		$lifting=str_replace('S', '',$lifting);

		$cek=$this->db->query("SELECT id FROM temp_plc WHERE keyjss='".$keyjss."' and pos='".$pos_level."' and finish is null limit 1")->row();
		$key=$this->db->get_where('tbl_m_plc',array('pos'=>$pos_level),1)->row();
		if(empty($cek) AND !empty($key)){
			$mplc= $this->db->query("SELECT * FROM tbl_m_matrixplc WHERE SUBSTRING_INDEX(part_no,'-',2)='".$part_no."' and suffix_master like '%".$suffix."%' limit 1")->row();
			if(empty($mplc)){
				$plc_code='Empty';
			}else{
				$plc_code=$mplc->plc_code;
			}
			$dataplc= array(
					'ip_address'=>$key->ip_address,
					'station_no'=>$key->station_no,
					'pos'=>$key->pos,
					'plc_name'=>$key->plc_name,
					'keyjss'=>$keyjss,
					'tipe_data'=>$key->tipe_data,
					'reg1'=>$key->reg1,
					'reg2'=>$key->reg2,
					'reg3'=>$key->reg3,
					'reg4'=>$key->reg4,
					'reg5'=>$key->reg5,
					'reg6'=>$key->reg6,
					'data1'=>intval($lifting),
					'data2'=>$plc_code,
					'data3'=>$key->data3,
					'data4'=>$key->data4,
					'data5'=>$key->data5,
					'data6'=>$key->data6,
					'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
					'status'=>'put',

		    );
			$this->db->insert('temp_plc',$dataplc); 
		}
	}
}
function rm($keyjss,$pos,$plc_code){
	if($keyjss!=NULL){
		$dataqr=explode('|', $keyjss);
		$part_no=$dataqr[0];
		$suffix=$dataqr[1];
		$lifting=$dataqr[2];
		$lifting=str_replace('S', '',$lifting);
		$cek=$this->db->query("SELECT id FROM temp_plc WHERE keyjss='".$keyjss."' and substring(plc_name,1,2)='RM' and pos='".$pos."' and finish is null limit 1")->row();
		if(empty($cek)){
			$key=$this->db->query("SELECT * FROM tbl_m_plc WHERE substring(plc_name,1,2)='RM' and pos='".$pos."' limit 1")->row();
			$dataplc= array(
				'ip_address'=>$key->ip_address,
				'station_no'=>$key->station_no,
				'pos'=>$key->pos,
				'plc_name'=>$key->plc_name,
				'keyjss'=>$keyjss,
				'tipe_data'=>$key->tipe_data,
				'reg1'=>$key->reg1,
				'reg2'=>$key->reg2,
				'reg3'=>$key->reg3,
				'reg4'=>$key->reg4,
				'reg5'=>$key->reg5,
				'reg6'=>$key->reg6,
				'data1'=>intval($lifting),
				'data2'=>$plc_code,
				'data3'=>$key->data3,
				'data4'=>$key->data4,
				'data5'=>$key->data5,
				'data6'=>$key->data6,
				'put'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
				'status'=>'put',

		    );
			$this->db->insert('temp_plc',$dataplc); 
		}
	}
}
function storage($pos,$shipping_id,$trip,$bp,$lifting1,$lifting2,$code_plc,$status){
	if($code_plc!=NULL){
		$lifting1=str_replace('S', '',$lifting1);
		$lifting2=str_replace('S', '',$lifting2);
		$this->db->query("DELETE FROM tbl_plc_storage WHERE pos='".$pos."' and shipping_id='".$shipping_id."'  and basepallet='".$bp."' and code_plc='".$code_plc."'");
		$dataplc= array(
			'pos'=>$pos,
			'shipping_id'=>$shipping_id,
			'trip'=>$trip,
			'basepallet'=>$bp,
			'lifting1'=>$lifting1,
			'lifting2'=>$lifting2,
			'code_plc'=>$code_plc,
			'status'=>$status,
			'start_time'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
			'finish_time'=>null
	    );
		$this->db->insert('tbl_plc_storage',$dataplc); 
	}
}


}
