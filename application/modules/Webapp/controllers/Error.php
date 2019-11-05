<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
  
	public function index()
    {

	 	$data['title'] = ""; 
		$this->load->view('Error/Error404',$data);
    }
   






}
?>