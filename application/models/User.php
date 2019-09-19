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
            $data['Admindata']['school_id'] = $this->db->insert_id();
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

    /**
     * Return country 
     *
     * Commom menthod for outputting 
     *
     * @return object
     */
    function get_uesrdetails($user_id){
        $sql = 'users.user_id,users.user_type,
        school_name,school_address,school_country,school_city,school_phone,school_email,school_website,contact_name,
        contact_phone,contact_mobile,contact_email,contact_position,users.is_active as user_is_active ,users.status as user_status,
        school.is_active as school_is_active ,school.status as school_status ,users.first_name as user_first_name,
        users.last_name as user_last_name,users.email as user_email';
         $this->db->select($sql);
         $this->db->from('users');
         $this->db->join('school','users.school_id = school.school_id','inner');
         $this->db->where('users.user_id',$user_id);
         return $this->db->get()->row();
    }


 }
?>