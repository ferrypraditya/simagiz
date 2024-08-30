<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Email extends CI_Controller {
    function __construct() {
        parent::__construct();
//            jika belum login redirect ke login
    }
    function send(){
					$host="ssl://smtp.gmail.com";
					$port="465";
					$username= "xyzlogpad@gmail.com";
					$password= "imamfada800178";
					$toemail=array('imamfaozi10@gmail.com','imamfaozi1@gmail.com');
					$alias="Admin Log";					
				   //kirim notifications email
				   $config = array();
				   $config['charset'] = 'utf-8';
				   $config['useragent'] ='Codeigniter'; //bebas sesuai keinginan kamu
				   $config['protocol']= "smtp";
				   $config['mailtype']= "html";
				   $config['smtp_host']=$host;
				   $config['smtp_port']=$port;
		
				   $config['smtp_timeout']= "500";
				   $config['smtp_user']= $username;//isi dengan email kamu
				   $config['smtp_pass']= $password; // isi dengan password kamu
				   $config['crlf']="\r\n"; 
				   $config['newline']="\r\n"; 
				  
				   $config['wordwrap'] = TRUE;
				   //memanggil library email dan set konfigurasi untuk pengiriman email
				   
				   $this->email->initialize($config);
				   //konfigurasi pengiriman
				   $msg="<h3 style='color:#0E2D0B'>Thank You For Using WOORI SAUDARA Priority Internet Banking</h3> <br/>
						We would like to inform you, the transaction you've performed for the following period : <br/>
						<br/>
						<table border='0' cellspacing='2' cellpadding='1'>
						 <tr>
							<td>Transaction ID</td>
							<td>: ".$alias."</td>
						  </tr>
		
						  <tr>
							<td>Created By</td>
							<td>:  ".$username."</td>
						  </tr>
						</table>
						<br/>
						We hope this information is useful for you.<br/>
						<br/>
						<a href='http://sos.step.co.id/sos' target='_blank'>download</a>
						<br>
						If you have any question or comment regarding your transaction, 
						please contact us at cs@ibwoorisaudara.com <br/>
						<br/>
						Thank you.<br/>
						<br/>
						<h4 style='color:#0E2D0B'>Best regards,</b><br/>
						<br/>
						<br/>
						Admin Priority Service</h4>";
					   $this->email->from($username,$alias);
					   $this->email->to($toemail);
					   $this->email->subject('Notification Transaction');
					   $this->email->message($msg);
				   		  	if($this->email->send()) {
					            echo 'Email sent.';
					        }else{
					            show_error($this->email->print_debugger());
					        }
	
	}
	function ext(){
		$this->load->library('email');   
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
		$config['protocol'] = "smtp";
		$config['mailtype'] = "html";
		$config['smtp_host'] = 'ssl://mail.rahmansolusiindonesia.com';
		$config['smtp_port'] = '465';

		$config['smtp_timeout'] = "500";
		$config['smtp_user'] = 'developer@rahmansolusiindonesia.com'; //isi dengan email kamu
		$config['smtp_pass'] = 'Rsideveloper2022'; // isi dengan password kamu
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";

		$config['wordwrap'] = TRUE;
		//memanggil library email dan set konfigurasi untuk pengiriman email

		$this->email->initialize($config);
        $this->email->from('developer@rahmansolusiindonesia.com', 'Test email');
        $this->email->to('imamfaozi10@gmail.com');
        $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
        $this->email->message('Contoh pesan yang dikirim dengan codeigniter');

          if($this->email->send()) {
               echo 'Email berhasil dikirim';
          }
          else {
               echo 'Email tidak berhasil dikirim';
               echo '<br />';
               echo $this->email->print_debugger();
          }

	}
}