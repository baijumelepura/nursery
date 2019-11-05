<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->model('User');
		$this->load->model('Permission');
	}
function index($id = null){
	  $data = [];
	  $data['permissions'] = $this->Permission->get_permission();
	  $data['school_id'] = $id  ? $id  : config_item('UserData')->school_id;
	  $this->load->view('Role/Index',$data);
   // $this->load->view('Roles/Index');
}
function get_roles($id=null){
    echo json_encode($this->Permission->get_roles($id));
	exit;
}
function getuserdetails($id=null){
    echo json_encode($this->Permission->get_userdetails($id));
	exit;
}
function add_role($id=null){
	$_POST = json_decode(file_get_contents('php://input'), true);
	if($_POST){
	$posts = $this->input->post();
	$perm = $this->Permission->insert_role(['user_role_name'=>$posts['role'],
									'all_role_id'=>json_encode($posts['permission']),
									'school_id'=>$id]);
	$this->get_roles($id);
	//echo json_encode($perm);
	}
 exit;
}
function get_permission($id){
	if($id){
		$perm = $this->Permission->get_userrole($id);
		$perm->all_role_id = $perm->all_role_id ? json_decode($perm->all_role_id) : [];
		echo json_encode($perm);
	}
    exit;
}
function update_role($id , $school_id = null){
	$_POST = json_decode(file_get_contents('php://input'), true);
	if($_POST){
	$posts = $this->input->post();
	$perm = $this->Permission->update_role(['user_role_name'=>$posts['role'],
									'all_role_id'=>json_encode($posts['permission'])],$id);
	$this->get_roles($school_id);
	}
 exit;
}
function delete_rule($school_id){
	$_POST = json_decode(file_get_contents('php://input'), true);
	if($_POST){
		$posts = $this->input->post();
		$perm = $this->Permission->delete_rule($posts['id']);
		$this->get_roles($school_id);
	}
 exit;

}









}
?>