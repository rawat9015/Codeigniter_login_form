<?php
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
      if(! $this->session->userdata('email')){
        redirect('User/login');
      }
    }
    public function index(){
        if($this->session->userdata('email')){
            $this->load->view('panel/dashboard');
        }
        else{
            redirect('User/login');
        }
        
    }
    
    public function category(){

        echo "<h1>Category</h1>";
    }

    public function post(){
        echo "<h1>Post</h1>";
    }
}

?>