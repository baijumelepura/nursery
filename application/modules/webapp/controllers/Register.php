<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
	public function __construct(){
		parent::__construct();
	$this->load->model('User');

	}
	public function index()
    {
        $data['title'] = "Register a new membership";  
        
	//	echo openssl_decrypt(openssl_encrypt("baiju***'.", "AES-128-ECB",config_item('encryption_key')),"AES-128-ECB",config_item('encryption_key'));
	if($this->input->post()){

		 /*school Details add */
		$FormData['schoolData'] = [
			"school_name"=>$this->input->post('NurseryName'),
			"school_address"=>$this->input->post('NurseryAddress'),
			"school_country"=>$this->input->post('NurseryCountry'),
			"school_city"=>$this->input->post('NurseryCity'),
			"school_phone"=>$this->input->post('NurseryPhone'),
			"school_email"=>$this->input->post('NurseryEmail'),
			"school_website"=>$this->input->post('NurseryWebsite'),
			"contact_name"=>$this->input->post('ContactName'),
			"contact_phone"=>$this->input->post('ContactPhone'),
			"contact_mobile"=>$this->input->post('ContactMobile'),
			"contact_email"=>$this->input->post('ContactEmail'),
			"contact_position"=>$this->input->post('ContactPosition')];
		/* Admin Details */
		$FormData['Admindata'] = [
			'email'=>$this->input->post('email'),
			'password'=>openssl_encrypt($this->input->post('password'),"AES-128-ECB",config_item('encryption_key'))];

		$result = $this->User->Signup($FormData);



	}
        $this->load->view('register/register',$data);

	}
}
?>