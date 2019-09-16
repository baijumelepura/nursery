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
		/*capta config */ 
		$vals = array(
			'word'          => rand(1,999999),
			'img_path'      => './assets/captcha/images/',
			'img_url'       => base_url('assets').'/captcha/images/',
			'font_path'     => base_url('assets').'/captcha/fonts/XYZ.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'word_length'   => 8,
		    'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40))
			);
		 $data = array_merge(create_captcha($vals),$data);

	//	echo openssl_decrypt(openssl_encrypt("baiju***'.", "AES-128-ECB",config_item('encryption_key')),"AES-128-ECB",config_item('encryption_key'));
	if($this->input->post()){

		$this->form_validation->set_rules('NurseryName','Name','trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('NurseryPhone','Phone','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('NurseryCity','City','trim|required');
		$this->form_validation->set_rules('NurseryAddress','Address','trim|required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('NurseryEmail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('NurseryCountry', 'Country', 'trim|required');
		$this->form_validation->set_rules('NurseryWebsite', 'Website', 'trim|required|callback_valid_url');
		$this->form_validation->set_rules('ContactName','Contact Name','trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('ContactMobile','Mobile','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('ContactPhone','Phone','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('ContactPosition', 'Position', 'trim|required');
		$this->form_validation->set_rules('ContactEmail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[10]');//callback_password_check|
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('cpassword', 'Retype password', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_validate_captcha');
		$this->form_validation->set_rules('checkbox', 'agree', 'trim|required');
	
	if($this->form_validation->run()==true){
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

		redirect('register');
	}

	}
        $data['country']=$this->User->get_country();
        $this->load->view('register/register',$data);

	}
	public function password_check($str)
{
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     return TRUE;
   }
   return FALSE;
}
public function validate_captcha($capchar){
    if($capchar != $this->input->post('capchar'))
    {
        $this->form_validation->set_message('validate_captcha', 'Wrong captcha code');
        return false;
    }else{
		return true;
	}}
	function valid_url($url){
  //  $pattern = "/^((ht|f)tp(s?)\:\/\/|~/|/)?([w]{2}([\w\-]+\.)+([\w]{2,5}))(:[\d]{1,5})?.";
    if (!filter_var($url, FILTER_VALIDATE_URL))
    {
        return FALSE;
    }
    return TRUE;
}

}
?>