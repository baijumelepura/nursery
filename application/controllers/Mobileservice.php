<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobileservice extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User');

	}
	public function index()
	{
	  // header('Content-Type: application/json');

	   if(isset($_POST['Method'])){
		switch ($_POST['Method']) {	
			case "SignUp":
				$this->SignUp($_POST);
				break;
			default:
		     	echo json_encode($this->error('No Data Found', '404'));
			exit;
		}
		}else{
			echo json_encode($this->error('No Data Found', '400'));
			exit;
		}

	}

   /**
     * Return signup 
     *
     * Commom menthod for outputting signup
     *
     * @return json
     */
	private function SignUp($data){
		$data = [
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => $data['password'],
		 ];
		$result = $this->User->Signup($data);
	    echo $result ? json_encode($this->success($data)) : json_encode($this->error('DB error', "404"));
      exit;
	}

    /**
     * Return Error Message
     *
     * Commom menthod for outputting error message
     *
     * @return array
     */
    private function error($message, $code)
    {
        return array(
            'data' => null,
            'status' => false,
            'error' => array(
                'errorMsg' => $message,
                'errorCode' => $code
            )
        );
    }

    /**
     * Return Success Message
     *
     * Commom menthod for outputting success message
     *
     * @return array
     */
    private function success($data)
    {
        return array(
            'data' => $data,
            'status' => true,
            'error' => null
        );
    }







}
