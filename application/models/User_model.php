<?php 
class User_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function insert($field_record){
     $result = $this->db->insert('registration',$field_record);
      return ($result == 1) ? true : false;
    //   return ($this->db->affected_rows() == 1) ? true : false;
    }
    
    public function match_user($login_details){
        $this->db->where($login_details);
        $this->db->get('registration');
    //    return ($this->db->affected_rows() >= 1) ? true : false;
    return($this->db->affected_rows());
        //  print_r($result);die;
       
    }

    
}

?>