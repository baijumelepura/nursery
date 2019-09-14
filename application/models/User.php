<?php

class User extends CI_Model {

   /**
     * Return signp 
     *
     * Commom menthod for outputting signup
     *
     * @return Boolean
     */
    // private static $db;
    // function __construct() {
    //   parent::__construct();
    //   self::$db = &get_instance()->db;
    // }

    public function Signup($data)
    {

        if($this->db->insert('school', $data['schoolData'])){
            return $this->db->insert('users', $data['Admindata']) ? true : false;
        }else{
            return false;
        }
    }



}
?>