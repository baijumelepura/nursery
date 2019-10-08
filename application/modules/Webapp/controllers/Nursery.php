<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nursery extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
	}
	function index(){
		$this->load->view('Nursery/Nursery');
	}
	function all_nursery(){
		if($this->input->post()){
				/*total count*/
				$response = $this->User->nurserycount();
				echo json_encode($response);
		}
    exit;
	}
	function request_viewed(){
		if($this->input->post('number')){
	       echo json_encode($this->User->request_view($this->input->post('number')));
		}
		exit;
  }
  function delete(){
	if($this->input->post('number')){
		echo json_encode($this->User->NurseryDelete($this->input->post('number')));
	 } 
	 exit;
  }
  function Action(){
	if($this->input->post('number')){
		$action = ['is_active'=>($this->input->post('is_active')==0) ? 1 :0];
		echo json_encode($this->User->ActiveNursery($action,$this->input->post('number')));
	}
    exit;
  }
function edit($id=null){
	$data['title'] = "Edit membership";
	$data['slug'] = "Edit-Membership";
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
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[10]');//callback_password_check|
	    //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_unique');
		//$this->form_validation->set_rules('cpassword', 'Retype password', 'trim|required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_validate_captcha');
        //$this->form_validation->set_rules('checkbox', 'agree', 'trim|required');
		$this->form_validation->set_rules('file', 'Image', 'callback_file_check');
		
		if($this->form_validation->run()==true){
		$result = $this->User->school_edit($id);
			$this->session->set_tempdata('Success', '<div class="callout callout-success" style="padding: 7px 0px 15px 15px;">
			You have Updated successfully.
			</div>',2);
			redirect('nursery/edit/'.$id);
		} 
	}
    $data['country']=$this->User->get_country();
	$data['school']=$this->User->edit_get_nursery($id);
	$this->load->view('Nursery/Edit',$data);
} 
function add(){
	$data['title'] = "Register a new membership";
	$data['slug'] = "Admin-Add-Membership";
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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_unique');
		$this->form_validation->set_rules('cpassword', 'Retype password', 'trim|required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_validate_captcha');
		$this->form_validation->set_rules('checkbox', 'agree', 'trim|required');
		$this->form_validation->set_rules('file', 'Image', 'callback_file_check');

	if($this->form_validation->run()==true){
		$result = $this->User->Signup("Web-Add");
		$this->session->set_tempdata('Success', '<div class="callout callout-success" style="padding: 7px 0px 15px 15px;">
		You have registered successfully.
		</div>',1);
		redirect('nursery/add');
	} }



    $data['country']=$this->User->get_country();
	$this->load->view('Nursery/Add',$data);
}
     /*
     * file value and type check during validation
     */
 public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
			$mime = get_mime_by_extension($_FILES['file']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;}
            }else{
          //  $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return true;
        }
	}
public function password_check($str){
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     return TRUE;
   }
   return FALSE;
}

    /**
     * validate Website URl for signup
     */
function valid_url($url){
     if (!filter_var($url, FILTER_VALIDATE_URL))
    {
        return FALSE;
    }
    return TRUE;
}

function unique($email){
	$emailunique=$this->User->emailunique($email);
	if($emailunique){
		$this->form_validation->set_message('unique', 'The Email field must contain a unique value');
        return false;
	}
	return true;
}

}