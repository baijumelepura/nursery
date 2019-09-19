<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('User');
	}
    /**
     * Signup  for school / admin
     */
	public function index()
    {
		$data['title'] = "Dashboard"; 
		$this->load->view('dashboard/dashboard',$data);
    }
   






}
?>