<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('User');
	}
    /**
     * Signup  for school / admin
     */
	public function index()
    {
		$data['title'] = "Profile"; 
		$this->load->view('Users/Profile',$data);
    }
   






}
?>