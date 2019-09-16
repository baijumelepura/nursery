<?php

class User extends CI_Model {

   /**
     * Return signp 
     *
     * Commom menthod for outputting signup
     *
     * @return Boolean
     */
    public function Signup($data)
    {
        if($this->db->insert('school', $data['schoolData'])){
            return $this->db->insert('users', $data['Admindata']) ? true : false;
        }else{
            return false;
        }
    }
    /**
     * Return country 
     *
     * Commom menthod for outputting country
     *
     * @return object
     */
    function get_country(){
        return $this->db->select('country_id,name')->get('country')->result();
    }

    /**
     * Return country 
     *
     * Commom menthod for outputting country
     *
     * @return object
     */
    function signin($data){
        $this->db->select('user_id,email,password');
        $this->db->where(array('email'=>$data['email'],'password' =>$data['password']));
        $this->db->limit(1);
        return $this->db->get('users')->row();
    }


}
?>