<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!');
class WorkModel extends CI_Model{
	 function __construct(){
        parent::__construct();
	}
	function worktime($line_no=false){
		$qs=$this->db->query("SELECT *,if(start>finish and start>time(now()),DATE(DATE_ADD(now(),INTERVAL -1 DAY)),DATE(now())) as prod_date,if(start>finish and start<time(now()),DATE(DATE_ADD(now(),INTERVAL +1 DAY)),DATE(now())) as prod_finish,if(start>finish and start>time(now()),DAYNAME(DATE_ADD(now(),INTERVAL -1 DAY)),DAYNAME(now())) as prod_day FROM working_time WHERE day=if(start>finish and start>time(now()),DAYNAME(DATE_ADD(now(),INTERVAL -1 DAY)),DAYNAME(now())) AND ((start < finish and (start <= time(now()) and finish > time(now()))) OR (start > finish and (start <= time(now()) OR finish > time(now())))) AND line_no=".$line_no." limit 1")->row();
        if(!empty($qs)){
        	$prod_date = $qs->prod_date;
        	$prod_finish = $qs->prod_finish.' '.$qs->finish;
        	$prod_start = $qs->prod_date.' '.$qs->start;
            $prod_shift = $qs->shift;
            $prod_day = $qs->prod_day;
            $finishshift=$qs->finish;
        	$startshift=$qs->start;
            $work_time=1;
        }else{
        	$work_time=0;
        	$prod_start=0;
        	$prod_finish=0;
        	$finishshift=0;
        	$startshift=0;
        	$hour= intval(gmdate('H',time()+60*60*7));
	        $menit= intval(gmdate('i',time()+60*60*7));
	        $cek=($hour*60)+$menit;
	        if($cek<=420){
	            $prod_date = date('Y-m-d',strtotime('-1 days',strtotime(gmdate('Y-m-d',time()+60*60*7))));
	            $prod_shift = "Night";
	            $prod_day = date('l',strtotime('-1 days',strtotime(gmdate('Y-m-d',time()+60*60*7))));

	        }else{
	            $prod_date = gmdate('Y-m-d',time()+60*60*7);
	            $prod_shift = "Day";
	            $prod_day = gmdate('l',time()+60*60*7);
	            if($cek>1260){
	            	$prod_shift = "Night";
	            }
	        }
        }
		
        $qr=$this->db->query("SELECT sum(if(start < finish AND time(now())>=start AND time(now())<=finish,1,0)) + sum(if(start > finish AND time(now())>=start AND time(now())>finish,1,0)) + sum(if(start > finish AND time(now())<start AND time(now())<finish,1,0)) as istinow FROM tbl_rest_time where day='".$prod_day."' and shift='".$prod_shift."' limit 1")->row();

        $data['prod_date']=$prod_date;
        $data['prod_start']=$prod_start;
        $data['prod_finish']=$prod_finish;
        $data['startshift']=$startshift;
        $data['finishshift']=$finishshift;
        $data['prod_day']=$prod_day;
        $data['prod_shift']=$prod_shift;
        $data['rest_time']=$qr->istinow;
        $data['work_time']=$work_time;
		return $data;
	 }
	
}
