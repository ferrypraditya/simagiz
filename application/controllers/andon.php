<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Andon extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('user_agent');  		
    }
    
 function index(){
 	$qt= $this->db->query('select * from tbl_title limit 1')->row();
 	$data=array(
     	'qt'=>$qt,
			'data_andon'=>$this->db->query("SELECT * FROM tbl_menu WHERE parent='andon' ORDER BY orders ASC")->result(),
		);	
 	$this->load->view('andon/home',$data);
 }
 function plc(){
	$pesan=$this->db->get_where('tbl_pesan_andon',array('andon'=>'Admin'),1)->row();
	$data=array(
		'title'=>'ANDON PLC & PRINTER',
		'plc'=>'PLC',
		'printer'=>'PRINTER',
		'pesan'=>$pesan
	);
	$this->load->view('andon/andonplc',$data);
}
function lifting(){
	$pesan=$this->db->get_where('tbl_pesan_andon',array('andon'=>'Admin'),1)->row();
	$data=array(
		'title'=>'MONITORING PROGRES LIFTING',
		'pesan'=>$pesan
	);
	$this->load->view('andon/andonlifting',$data);
}
function viewlifting(){
	$this->db->select("a.ip_address,a.area,a.line,a.pos,a.deskripsi,b.status,b.send2,c.shop,c.trip,c.lifting_no");
	$this->db->select("if(a.update_time>=DATE_ADD(now(),INTERVAL -10 SECOND),'OK','NG') as plc",FALSE);
	$this->db->from('tbl_master_plc a');
	$this->db->join('view_mon_plc b', 'a.line=b.line and a.pos=b.pos', 'left');
	$this->db->join('tbl_calcprod c', 'b.keyjss=c.qrcode', 'left');
	$this->db->where_in('a.area',array('ASSY','RM','SPS'));
	$qplc= $this->db->get()->result();
	$qqc=$this->db->query("SELECT a.line_no,a.pos_level,b.shop,b.trip,c.lifting_no,c.quality_time,c.status,c.location from tbl_pos a INNER JOIN tbl_h_assy c ON(a.user_level='QC' and a.line_no=c.line_no) LEFT JOIN tbl_calcprod b ON(b.qrcode=c.qrcode) where c.id = (SELECT max(id) from tbl_h_assy where line_no = a.line_no and lifting_no not like '%K-%')")->result();
	$data=array(
		'qplc'=>$qplc,
		'qqc'=>$qqc,
		
	);
	$this->load->view('andon/viewlifting',$data);
}
function viewplc(){
	$this->db->select("a.ip_address,a.area,a.line,a.pos,a.deskripsi,b.status,b.send2");
	$this->db->select("if(a.update_time>=DATE_ADD(now(),INTERVAL -10 SECOND),'OK','NG') as plc",FALSE);
	$this->db->from('tbl_master_plc a');
	$this->db->join('view_mon_plc b', 'a.line=b.line and a.pos=b.pos', 'left');
	$this->db->where_in('a.area',array('ASSY','RM','SPS'));
	$qplc= $this->db->get();
	$qqc=$this->db->query("SELECT a.line_no,a.pos_level,a.user_level,b.ip_no,c.lifting_no,c.quality_time,c.status,c.location from tbl_pos a INNER JOIN tbl_ip b on(a.user_level='QC' and a.pos_level=b.pos_level) INNER JOIN tbl_h_assy c ON(a.line_no=c.line_no) where c.id = (SELECT max(id) from tbl_h_assy where line_no = a.line_no)")->result();
	$data=array(
		'qplc'=>$qplc->result(),
		'qqc'=>$qqc,
	);
	$this->load->view('andon/viewplc',$data);
}
function viewprinter(){
	$qp=$this->db->get('tbl_master_printer')->result();
	$data=array(
		'qp'=>$qp,
	);
	$this->load->view('andon/viewprinter',$data);
}
function andonglobal(){	
	 $data=array(
		'data_line'=>$this->db->query("SELECT * FROM tbl_m_line order by line_no asc")->result(),		
		);	
		$this->load->view('andon/andonglobal',$data);
		  
	}
function resultglobal(){
		$data_line=$this->db->query("SELECT * FROM tbl_m_line order by line_no asc")->result();
		$datetime=gmdate('Y-m-d H:i:s',time()+60*60*7);	
		foreach($data_line as $row){
			$line_no=$row->line_no;
			$qw=$this->WorkModel->worktime($line_no);
			$takt_time=$row->takt_time;
			$status="OFF";
			$target=0;
			$target1=0;
			$kerja=0;
			$model="OFF";
			$finishshift=$qw['finishshift'];
			$akhir=$qw['prod_finish'];

			$data_target=$this->db->query("select model,status,line_no,takt_time,lifting_no,start_target,target,TIMESTAMPDIFF(SECOND,start_target,now()) as kerja from tbl_eff_line where  prod_date='".$qw['prod_date']."'  and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."' limit 1")->row();	
			if(strtotime($datetime)>strtotime($akhir)){
				$data_target=$this->db->query("select model,status,line_no,takt_time,lifting_no,start_target,target,TIMESTAMPDIFF(SECOND,start_target,time('".$akhir."')) as kerja from tbl_eff_line where  prod_date='".$qw['prod_date']."'  and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."' limit 1")->row();
			}	
			if(!empty($data_target)){
				$kerja = $data_target->kerja;
	    		$target1 = $data_target->target;
	    		$start_target=$data_target->start_target;
	    		$takt_time = $data_target->takt_time;
	    		$status=$data_target->status;
	    		$model=$data_target->model;
			}			

	    	$cekstart=explode(':',$qw['startshift']);
			$cekfinish=explode(':',$qw['finishshift']);
			$hourst=intval($cekstart[0]);
			$hourfi=intval($cekfinish[0]);
			$minutest=intval($cekstart[1]);
			$minutefi=intval($cekfinish[1]);
	    	$cekstart=($hourst*60)+$minutest;
	    	$cekfinish=($hourfi*60)+$minutefi;
			if($cekstart < $cekfinish){
				$key=$this->db->query("select 
					sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) <  a.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
					sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >=  a.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
					sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) > a.start AND  time(now()) <  a.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."') ,time(now())),0)) +
					sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) > a.start AND  time(now()) >=  a.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."') ,a.finish),0)) as istirahat
					from tbl_rest_time a inner join working_time b on(a.day=b.day and a.shift=b.shift) where b.day='".$qw['prod_day']."' AND b.shift='".$qw['prod_shift']."' and b.line_no='".$line_no."' limit 1")->row();
			}else{
					$key=$this->db->query("select 
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) < a.start AND  time(now()) < a.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,time(now()),a.start),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) < a.start AND  time(now()) >= a.finish AND  time(now()) <= b.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,a.finish,a.start),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish <= b.finish AND time(now()) < b.start,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish AND time(now()) < b.start,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) >  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) < a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,time(now()),time('".$start_target."')),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) < a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,a.finish,time('".$start_target."')),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') < a.start AND time(now()) < a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
					sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') < a.start AND  time('".$start_target."') < a.finish AND time(now()) < a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') >  a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish AND  time('".$start_target."') < b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) < a.start AND  time(now()) <  b.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
					sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) < a.start AND  time(now()) <  b.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) as istirahat
					from tbl_rest_time a inner join working_time b on(a.day=b.day and a.shift=b.shift) where b.day='".$qw['prod_day']."' AND b.shift='".$qw['prod_shift']."' and b.line_no='".$line_no."' limit 1")->row();
			}
		    	
			$istirahat=$key->istirahat;
			if($istirahat<=0){
				$istirahat=0;
			}
		
			$target=floor(($kerja-$istirahat)/$takt_time)+$target1;
				
			if($status=="FINISH"){
				$target=$target1;
			}
			if($target<1){
    			$target=0;
    		}
			

			$query_eff=$this->db->query("select count(if(status='OK',id,null)) as ok,count(if(status='NG',id,null)) as ng from tbl_h_assy where prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."'  limit 1")->row();

			$query_bench=$this->db->query("select count(if(status='OK',status,null)) as bncok,count(if(status='NG',status,null)) as bncng from tbl_h_assy  where side='Bench' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."'  limit 1")->row();
			
			$qes=$this->db->query("select count(if(side='RH' and status='OK',id,null)) as okrh,count(if(side='RH' and status='NG',id,null)) as ngrh,count(if(side!='RH' and status='OK',id,null)) as oklh,count(if(side!='RH' and status!='OK',id,null)) as nglh from tbl_h_assy where prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."'  limit 1")->row();
			

			$data["plan".$line_no]=$row->plan;
			$ok=$query_eff->ok;
			$ng=$query_eff->ng;
			$bncok=$query_bench->bncok;
			$bncng=$query_bench->bncng;
			$eff=round(($ok+$ng+$bncok +$bncng)/$target,4)*100;
			$okpersen=round($ok/($ok+$ng+$bncok),2)*100;
			$ngpersen=round($ng/($ok+$ng+$bncng),2)*100;

			
			if($row->line_no=='5'){
				$data["actual".$row->line_no]=($ok+$ng).'+'.($bncok+$bncng);
			}else{
				$data["actual".$row->line_no]=$ok+$ng;
			}
			$data["eff".$row->line_no]=$eff;
			$data["okpersen".$row->line_no]=$okpersen;
			$data["ngpersen".$row->line_no]=$ngpersen;			
			$data["okrh".$row->line_no]=$qes->okrh;
			$data["oklh".$row->line_no]=$qes->oklh;
			$data["ngrh".$row->line_no]=$qes->ngrh;
			$data["nglh".$row->line_no]=$qes->nglh;			
			$data["status".$row->line_no]=$status;
			$data["target".$row->line_no]=$target; //+$bncok+$bncng;
			$data["takt_time".$row->line_no]=$takt_time;
		}
		$pa2=$this->db->query("SELECT * FROM tbl_h_problemso WHERE shop='2' and SUBSTRING(problem_time,1,10)=SUBSTRING(now(),1,10) and conf_time is null order by id desc limit 1")->row();
		$data['pa2']=false;
		$data['id2']=false;
		if(!empty($pa2)){
			$data['pa2']=$pa2->problem;
			$data['id2']=$pa2->id;
		}
		$data["prod_shift"]=$qw['prod_shift'];
		echo json_encode($data);
}
function confirmso(){
    $shop=$this->input->get('shop');
    $id=$this->input->get('id');
    $data=array(
     'qh'=>$this->db->get_where('tbl_h_problemso',array('id'=>$id),1)->row(),
    );  
    $this->load->view('andon/confirmso',$data);
  }
function submitconfirmso(){
    $data = array ('success' => false, 'messages' => array()); 
    $id=$this->input->post('id');
    $remarks=$this->input->post('remarks');                 
    $this->form_validation->set_rules('remarks', 'remarks', 'trim|required|callback_ceksfx');
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekusr');        
    $this->form_validation->set_error_delimiters('<p class="text-danger text-sm">', '</p>');
    if($this->form_validation->run()){
    $username=$this->input->post('username');
    $p=$this->input->post('password'); 
    $p = $this->sha1->generate($p);
    $p = strrev($p); $p=substr($p,5);
    $qu=$this->db->get_where('tbl_user',array('password'=>$p,'username'=>$username),1)->row();
    $qh=$this->db->query("SELECT * FROM tbl_h_problemso WHERE id='".$id."' limit 1 ")->row();
      $data2=array(
        'remarks'=>$this->input->post('remarks'),
        'conf_time'=>gmdate('Y-m-d H:i:s',time()+60*60*7),
        'conf_by'=>$qu->username.'|'.$qu->nama,
      );
      $q=$this->db->update('tbl_h_problemso',$data2,array('id'=>$id));
      if($q){
        $data['success'] = true;
      }else{
         $data['messages']['remarks'] = 'Update Failed !!';
      }
    
    } else {
      foreach ($_POST as $key => $value) {
        $data['messages'][$key] = form_error($key);
      }     

    }
  echo json_encode($data);
  }
 public function cekusr(){
    $username=$this->input->post('username');
    $p=$this->input->post('password'); 
    $p = $this->sha1->generate($p);
    $p = strrev($p); $p=substr($p,5);
    $qu=$this->db->get_where('tbl_user',array('password'=>$p,'username'=>$username),1)->row();   
      if(empty($qu)){
        $this->form_validation->set_message('cekusr', 'Username & Password tidak sesuai!');
          return FALSE;
      }else{
          return true;
      } 
    }
public function ceksfx(){
	$id=$this->input->post('id');
  	$qh=$this->db->query("SELECT * FROM tbl_h_problemso WHERE id='".$id."' limit 1 ")->row();
  	$sfx2=$qh->suffix;
  	$xx=explode(" ",$qh->problem);
  	$qm2=$this->db->query("SELECT * from tbl_m_seat WHERE suffix_master like '%".$sfx2."%'  and shop like '%2%' and status='Active' order by id asc")->result();
  	$qpick2=$this->db->query("SELECT a.part_no,a.suffix_master,b.seat_part_no,b.suffix_master FROM tbl_m_seat a left join tbl_m_matrixpickingsmall b ON(SUBSTRING_INDEX(a.part_no,'-',2)=SUBSTRING_INDEX(b.seat_part_no,'-',2) and b.suffix_master like '%".$sfx2."%') where b.seat_part_no is null and a.suffix_master like '%".$sfx2."%' group by a.part_no limit 1")->row();
    $qplc2=$this->db->query("SELECT a.part_no,a.suffix_master,b.part_no,b.suffix_master FROM tbl_m_seat a left join tbl_m_matrixplc b ON(SUBSTRING_INDEX(a.part_no,'-',2)=SUBSTRING_INDEX(b.part_no,'-',2) and b.suffix_master like '%".$sfx2."%') where b.part_no is null and  a.suffix_master like '%".$sfx2."%' group by a.part_no limit 1")->row();
  	
  	if($xx[0]=='Master'){	
	    if(empty($qm2)){
	      $st2='Master Seat suffix active ('.$sfx2.') shop 2 belum ada!';
	      $this->form_validation->set_message('ceksfx', $st2);
		  return FALSE;
	    }elseif(!empty($qpick2)){
	      $st2='Master Picking '.$qpick2->part_no.' Sfx '.$sfx2.' Belum Ada!';
	      $this->form_validation->set_message('ceksfx', $st2);
		  return FALSE;
	    }elseif(!empty($qplc2)){
	      $st2='Master PLC '.$qplc2->part_no.' Sfx '.$sfx2.' Belum Ada!';
	      $this->form_validation->set_message('ceksfx', $st2);
		  return FALSE;
	    }else{
	      return true;
	    }
	}else{
		return true;
	}
 }
function effline(){
	$line_no=$this->uri->segment(3);
	$this->normalisasidata($line_no);
	$qw=$this->WorkModel->worktime($line_no);
	$psn=$this->db->get_where('tbl_pesan_andon',array('andon'=>'Assembly'),1)->row();
	$ql= $this->db->get_where('tbl_m_line',array('line_no'=>$line_no),1)->row();
	
	$data_eff=$this->db->query("SELECT prod_hour,line_no,max(problem_detail) as problem,sum(planning) as planning,sum(ok) as ok,sum(ng) as ng,sum(target) as target FROM tbl_eff_hour WHERE line_no='".$line_no."' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' group by line_no,prod_hour order by id asc")->result();
		 $data=array(
         	'pesan_andon'=>$psn->pesan,
 			'prod_date'=>$qw['prod_date'],
 			'shift'=>$qw['prod_shift'],
 			'line_no'=>$line_no,
 			'line_name'=>$ql->line_name,
 			'takt_time'=>$ql->takt_time,
 			'data_eff'=>$data_eff,
 			'ql'=>$ql,
			);	

		$this->load->view('andon/effperline',$data);
		  
	}
function resultline(){
		$line_no=$this->input->post('line_no');
		$qw=$this->WorkModel->worktime($line_no);
		$takt_time=$this->input->post('takt_time');
		$datetime=gmdate('Y-m-d H:i:s',time()+60*60*7);	
		$ql=$this->db->get_where('tbl_m_line',array('line_no' =>$line_no),1)->row();
		$planning=$ql->plan;
		$finishshift=$qw['finishshift'];
		$akhir=$qw['prod_finish'];

		$data_target=$this->db->query("select model,status,line_no,takt_time,lifting_no,start_target,target,TIMESTAMPDIFF(SECOND,start_target,now()) as kerja from tbl_eff_line where  prod_date='".$qw['prod_date']."'  and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."' limit 1")->row();
		if(strtotime($datetime)>strtotime($akhir)){
			$data_target=$this->db->query("select model,status,line_no,takt_time,lifting_no,start_target,target,TIMESTAMPDIFF(SECOND,start_target,time('".$akhir."')) as kerja from tbl_eff_line where  prod_date='".$qw['prod_date']."'  and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."' limit 1")->row();
		}
		if(!empty($data_target)){
			$kerja = $data_target->kerja;
    		$target1 = $data_target->target;
    		$start_target=$data_target->start_target;
    		$takt_time = $data_target->takt_time;
    		$status=$data_target->status;
    		$lifting_no=$data_target->lifting_no;
    		$model=$data_target->model;
		}else{
			 $status="OFF";
			 $model="N/A";
		}
		
    	$hourst=date('H',strtotime($qw['startshift']));
    	$minutest=date('i',strtotime($qw['startshift']));
    	$hourfi=date('H',strtotime($qw['finishshift']));
    	$minutefi=date('i',strtotime($qw['finishshift']));
    	$cekstart=($hourst*60)+$minutest;
    	$cekfinish=($hourfi*60)+$minutefi;
		if($cekstart < $cekfinish){
			$key=$this->db->query("select 
				sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) <  a.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
				sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >=  a.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
				sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) > a.start AND  time(now()) <  a.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."') ,time(now())),0)) +
				sum(if(b.start < b.finish AND a.start < a.finish AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) > a.start AND  time(now()) >=  a.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."') ,a.finish),0)) as istirahat
				from tbl_rest_time a inner join working_time b on(a.day=b.day and a.shift=b.shift) where b.day='".$qw['prod_day']."' AND b.shift='".$qw['prod_shift']."' and b.line_no='".$line_no."' limit 1")->row();
		}else{
				$key=$this->db->query("select 
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) < a.start AND  time(now()) < a.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,time(now()),a.start),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) < a.start AND  time(now()) >= a.finish AND  time(now()) <= b.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,a.finish,a.start),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish <= b.finish AND time(now()) < b.start,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish AND time(now()) < b.start,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) >  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) < a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,time(now()),time('".$start_target."')),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time(now()) < a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish,86400-TIMESTAMPDIFF(SECOND,a.finish,time('".$start_target."')),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') < a.start AND time(now()) < a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
				sum(if(b.start > b.finish AND a.start > a.finish AND a.start >= b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') < a.start AND  time('".$start_target."') < a.finish AND time(now()) < a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,a.start,time(now())),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') <= a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') >  a.start AND time(now()) > a.start AND  time(now()) <  a.finish AND a.finish <= b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),time(now())),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start < b.start AND time('".$start_target."') < b.start AND  time('".$start_target."') > a.start AND time(now()) > a.start AND  time(now()) >=  a.finish AND a.finish <= b.finish AND  time('".$start_target."') < b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') <= a.start AND time(now()) < a.start AND  time(now()) <  b.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,a.start,a.finish),0)) +
				sum(if(b.start > b.finish AND a.start < a.finish AND a.start >= b.start AND time('".$start_target."') >= b.start AND  time('".$start_target."') > a.start AND time('".$start_target."') < a.finish AND time(now()) < a.start AND  time(now()) <  b.finish AND a.finish > b.finish,TIMESTAMPDIFF(SECOND,time('".$start_target."'),a.finish),0)) as istirahat
				from tbl_rest_time a inner join working_time b on(a.day=b.day and a.shift=b.shift) where b.day='".$qw['prod_day']."' AND b.shift='".$qw['prod_shift']."' and b.line_no='".$line_no."' limit 1")->row();
		}
	    	
		$istirahat=$key->istirahat;
		if($istirahat<=0){
			$istirahat=0;
		} 	
		$target=floor(($kerja-$istirahat)/$takt_time)+$target1;
		if($status=="FINISH"){
			$target=$target1;
		}

		$query_eff=$this->db->query("SELECT line_no,sum(planning) as planning,sum(target) as target,sum(ok) as ok,sum(ng) as ng FROM tbl_eff_hour WHERE line_no='".$line_no."' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' group by line_no")->result();
		$query_stop=$this->db->query("SELECT prod_hour,takt_time,line_no,planning,target,ok,ng FROM tbl_eff_hour WHERE line_no='".$line_no."' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' group by prod_shift,prod_hour order by id asc")->result();
		$query_hour=$this->db->query("SELECT prod_hour,line_no,sum(ok) as ok,sum(ng) as ng FROM tbl_eff_hour WHERE line_no='".$line_no."' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' group by line_no,prod_hour order by id asc")->result();
		
		$pln=$this->db->query("select sum(planning) as plan from tbl_eff_hour where prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' and line_no='".$line_no."' group by line_no limit 1")->row();
		
		//revisi
		$qhis=$this->db->query("SELECT count(if(code='RH' and status='OK',id,null)) as okrh,count(if(code='RH' and status!='OK',id,null)) as ngrh,count(if(code!='RH' and status='OK',id,null)) as oklh,count(if(code!='RH' and status!='OK',id,null)) as nglh FROM tbl_h_assy where line_no='".$line_no."' and prod_date='".$qw['prod_date']."'  and prod_shift='".$qw['prod_shift']."' limit 1")->row();
		$okrh=$qhis->okrh;
		$oklh=$qhis->oklh;
		$ngrh=$qhis->ngrh;
		$nglh=$qhis->nglh;
		
		$actual=$okrh+$oklh+$ngrh+$nglh;

		$query_bench=$this->db->query("select count(if(status='OK',status,null)) as bncok,count(if(status='NG',status,null)) as bncng from tbl_h_assy where side='Bench' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_date']."' and line_no='".$line_no."'  limit 1")->row();
		$bncok=$query_bench->bncok;
		$bncng=$query_bench->bncng;

		foreach ($query_eff as $value) {
			$eff=round(($value->ok+$value->ng + $bncok + $bncng )/$target,4)*100;
					
			$data["ok"]=$value->ok;
			$data["ng"]=$value->ng;
			$data["eff"]=$eff;
			}
			if(empty($query_eff)){
				$data["ok"]=0;
				$data["ng"]=0;
				$data["eff"]=0;
				$data["okpersen"]=0;
				$data["ngpersen"]=0;	
			}
		foreach ($query_stop as $key) {
			$tar=$key->target;
			$pl=$key->planning;
			if($tar>$pl){
				$tar=$pl;
			}
			$stop=round(($tar-($key->ok+$key->ng))*$key->takt_time/60,1);
			if($stop<=0){
				$stop=0;
			}
			$data["int".$key->prod_hour]=$stop;
		}

		foreach ($query_hour as $key) {
			$data["actual".$key->prod_hour]=$key->ok+$key->ng;
			if(empty($query_stop)){
				$data["int".$key->prod_hour]=0;
			}
		}
		$data["okrh"]=$okrh;
		$data["oklh"]=$oklh;
		$data["ngrh"]=$ngrh;
		$data["nglh"]=$nglh;
		$data["bnc"]=$bncok + $bncng;
		$okpersen=round(($okrh+$oklh+$bncok)/($value->ok+$value->ng+$bncok+$bncng),2)*100;
		//$okpersen = 5;
		//$ngpersen=round($value->ng/($value->ok+$bncng),2)*100;	
		$ngpersen=round(($ngrh+$nglh+$bncng)/($value->ok+$value->ng+$bncok+$bncng),2)*100;
		$data["okpersen"]=$okpersen;
		$data["ngpersen"]=$ngpersen;
		$data["planning"]=$planning;
		$data["lifting_no"]=$lifting_no;
		$data["status"]=$status;
		$data["target"]=$target+$bncok + $bncng;
		$data["actual"]=$actual;
		$data["takt_time"]=$takt_time;
		$data["model"]=$model;
		$data["shift"]=$qw['prod_shift'];
		echo json_encode($data);
}
function normalisasidata($line_no){
	$qw=$this->WorkModel->worktime($line_no);
	$qef=$this->db->get_where('tbl_eff_hour',array('line_no'=>$line_no,'prod_date'=>$qw['prod_date'],'prod_shift'=>$qw['prod_shift']))->result();
	
	$hour= intval(gmdate('H',time()+60*60*7));
	if(!empty($qef)){
		foreach ($qef as $key) {
			$qh=$this->db->query("select count(if(status='OK',id,null)) as ok,count(if(status!='OK',id,null)) as ng from tbl_h_assy where line_no='".$line_no."' and prod_date='".$key->prod_date."' and prod_shift='".$key->prod_shift."' and prod_hour='".$key->prod_hour."' limit 1")->row();
			$actual=$qh->ok+$qh->ng;
			$target_prod=$key->target;
			if($target_prod>$key->planning){
				$target_prod=$key->planning;
			}
			$eff=round($actual/$target_prod,4)*100;
			if(intval($key->prod_hour)==$hour){
				$this->db->query("UPDATE tbl_eff_hour set ok='".$qh->ok."',ng='".$qh->ng."',target='".$target_prod."',eff='".$eff."' WHERE id='".$key->id."' ");
			}else{
				$this->db->query("UPDATE tbl_eff_hour set ok='".$qh->ok."',ng='".$qh->ng."',target='".$target_prod."',eff='".$eff."' WHERE id='".$key->id."' and target>=0");
			}
			
		}

	}

}
function dataeffhour(){
	$line_no=$this->input->post('line_no');
	$qw=$this->WorkModel->worktime($line_no);
	$data_eff=$this->db->query("SELECT prod_hour,line_no,max(problem_detail) as problem,sum(planning) as planning,sum(ok) as ok,sum(ng) as ng,sum(target) as target FROM tbl_eff_hour WHERE line_no='".$line_no."' and prod_date='".$qw['prod_date']."' and prod_shift='".$qw['prod_shift']."' group by line_no,prod_hour order by id asc")->result();
		if(!empty($data_eff)){ 
			foreach ($data_eff as $key) { $x=$key->prod_hour+1;
			$dataplanning[]=$key->planning;
			$dataok[]=$key->ok;
			$datang[]=$key->ng;
			$dataeffhour[]=round(($key->ok+$key->ng)/$key->target,4)*100;
			$prod_hour=$key->prod_hour; 
		      $x=$prod_hour+1;
		      if($prod_hour<10){ $prod_hour='0'.$prod_hour;}
		      if($x<10){ $x='0'.$x;}
			$dataprod_hour[]=$prod_hour."~".$x;
		}}else{
			$dataplanning[]=0;
			$dataok[]=0;
			$datang[]=0;
			$dataprod_hour[]=0;
			$dataeffhour[]=0;
		}
		echo json_encode(array('dataplanning'=>$dataplanning,'dataeffhour'=>$dataeffhour,'dataok'=>$dataok,'datang'=>$datang,'dataprod_hour'=>$dataprod_hour));
	
}

function stockseat(){
	 	$psn= $this->db->get_where('tbl_pesan_andon',array('andon'=>'Assembly'),1)->row();
		$data_st=$this->db->query("SELECT COUNT(if(status='EMPTY',id,null)) as empty,COUNT(if(status='CRITICAL',id,null)) as critical,COUNT(if(status='NORMAL',id,null)) as normal,COUNT(if(status='OVER',id,null)) as over,COUNT(if(status='T/APROD',id,null)) as taprod,sum(stock) as tstock FROM view_stock_storage")->row();
		$data_seat=$this->db->query("SELECT * FROM view_stock_storage WHERE status='NORMAL' order by stock,status,idseat asc")->result();
		 $data=array(
         	'pesan_andon'=>$psn->pesan,
 			'prod_date'=>$this->prod_date,
 			'shift'=>$this->shift,
         	'data_st'=>$data_st,
         	'data_seat'=>$data_seat,
			);	
 	$this->load->view('andon/stockseat',$data);
 }
function resultstock(){
	$data = array ('tstock'=>0);
	$data_st=$this->db->query("SELECT sum(stock) as tstock FROM view_stock_storage")->row();
	$data['tstock']=$data_st->tstock;
	echo json_encode($data);
	}
function selectstock(){
	$status=$this->input->post('status');
 	$data_seat=$this->db->query("SELECT * FROM view_stock_storage WHERE status='".$status."' order by stock,status,idseat asc")->result();
 	$data=array(
         	'data_seat'=>$data_seat,
			);	
 	$this->load->view('andon/selectstock',$data);
 }
 function result_storage(){
	$data = array ('jumlah'=>0);
	$qj=$this->db->query("SELECT count(id) as jumlah FROM tbl_h_assy where location='STORAGE' or location='RM' limit 1")->row();
	$data['jumlah']=$qj->jumlah;
	echo json_encode($data);
	}
function view_storage(){
 	$data_rm=$this->db->query("SELECT grade,set_no,row_seat,code,sum(stock) as stock FROM view_stock_rm  group by grade,row_seat,code");
	$data_st=$this->db->query("SELECT * FROM view_stock_storage  order by zona desc");
 	$data=array(
         	'data_rm'=>$data_rm->result(),
         	'data_st'=>$data_st->result(),
         	'jumlah_zona'=>$data_st->num_rows(),
			);	
 	$this->load->view('andon/view_storage',$data);
 }

function delivery(){
	 	$qp= $this->db->get_where('tbl_pesan_andon',array('andon'=>'Delivery'),1)->row();
	 	$q1=$this->db->query("SELECT * FROM tbl_temp_shipping WHERE shop='1' and trip is not null limit 1")->row();
	 	$qd1=$this->db->query("SELECT * FROM tbl_delivery WHERE shop='1' limit 1")->row();
		$qs1=$this->db->query("SELECT * FROM view_trip WHERE shop='1' and prod_date='".$this->prod_date."' and prod_shift='".$this->shift."' order by id desc");
		$qw1=$this->db->query("SELECT * FROM tbl_master_wiptrip WHERE shop='1'  order by wiptrip asc")->result();
		if($qs1->num_rows()<15){
			$qs1=$this->db->query("SELECT * FROM view_trip WHERE shop='1' order by id desc limit 15");
		}
		$q2=$this->db->query("SELECT * FROM tbl_temp_shipping WHERE shop='2' and trip is not null limit 1")->row();
		$qd2=$this->db->query("SELECT * FROM tbl_delivery WHERE shop='2' limit 1")->row();
		$qs2=$this->db->query("SELECT * FROM view_trip WHERE shop='2' and prod_date='".$this->prod_date."' and prod_shift='".$this->shift."' order by id desc");
		$qw2=$this->db->query("SELECT * FROM tbl_master_wiptrip WHERE shop='2'  order by wiptrip asc")->result();
		if($qs2->num_rows()<15){
			$qs2=$this->db->query("SELECT * FROM view_trip WHERE shop='2' order by id desc limit 15");
		}
		 $data=array(
         	'qp'=>$qp,
 			'prod_date'=>$this->prod_date,
 			'shift'=>$this->shift,
 			'q1'=>$q1,
         	'q2'=>$q2,
         	'qs1'=>$qs1->result(),
         	'qs2'=>$qs2->result(),
         	'qd1'=>$qd1,
         	'qd2'=>$qd2,
         	'qw1'=>$qw1,
         	'qw2'=>$qw2,
			);	
 	$this->load->view('andon/delivery',$data);
 }
}