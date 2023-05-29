<?php 

class User extends CI_Controller{

    function __construct(){
        parent::__construct();
        // $this->load->model('User_model');
        // $this->load->library('session');
    }
    function form(){
        $this->load->view('form');
    }
    // function dashboard(){
    //     if($this->session->userdata('email')){
    //     $this->load->view('dashboard');
    // }
    // else{
    //     redirect('user/login');
    // }
    // }
    function error(){
        $this->load->view('error');
    }
    function registration(){
      if($this->input->post('submit')){
            // print_r($_POST);die;
            $user_name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
             
            $field_record = array(
                'name'=> $user_name,
                'email'=> $email,
                'password'=>$password
            );

           $affected_rows = $this->User_model->insert($field_record);

            if($affected_rows){
                redirect('User/dashboard');
            }
            else {
                echo 'not inserted successfully';
            }
      }
    }
    function login(){
       $this->load->view('login_form');
    }
    function logout(){
        $this->session->unset_userdata('email');
        redirect('User/login');
    }
    function login_details(){
        if($this->input->post('login')){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
             
            $login_details = array(
                'email' => $email,
                'password' => $password
            );

          $login_user = $this->User_model->match_user($login_details);
        //   echo $login_user; die;
          if($login_user > 0){
            $this->session->set_userdata('email',$email);
            // if($this->session->userdata('email')){
                redirect('Dashboard/index');
            // }
            // else{
            //     echo 'you must login first';
            // }

          }
          else{
            redirect('User/error');

          }

        }
    }

}


?>