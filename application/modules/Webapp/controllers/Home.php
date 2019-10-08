<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
	//	$this->load->model('Home');


	}
    /**
     * Signup  for school / admin
     */
	public function index()
    {
     // echo current_url();
	 // echo lang('error_email_missing');die();
	 	$data['title'] = lang('Dashboard'); 
		$this->load->view('Dashboard/Dashboard',$data);
    }
   






}
?>