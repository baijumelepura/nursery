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
function edit($id){

//	$this->load->file('controllers/frontend.php', false);

	//Frontend::_profile($id);

	$this->load->view('Nursery/Edit');




}










}