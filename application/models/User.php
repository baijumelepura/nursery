<?php

class User extends CI_Model {

// public $title;
// public $content;
// public $date;
   /**
     * Return signp 
     *
     * Commom menthod for outputting signup
     *
     * @return Boolean
     */
    public function Signup($data)
    {
    return $this->db->insert('users', $data);
    }



}
?>