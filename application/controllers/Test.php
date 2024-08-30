<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		
	}

	public function index()
	{
		$q = $this->WorkModel->worktime(6);
		print_r($q);
		//echo $q['prod_shift'];
	}
	
}