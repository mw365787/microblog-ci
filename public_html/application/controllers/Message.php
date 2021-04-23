<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
    public function index() {
        $name = $this->session->userdata('username');
        if($name != ''){
            $data = array('name' => $name);
            $this->load->view("ViewPost", $data);
        }else{
            redirect(base_url()."index.php/user/login");
        }
    }

    //doPost() function creates a post and inserts it into databas
    public function doPost(){
        if($this->session->userdata('username') == ''){
            redirect(base_url()."index.php/user/login");
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Msername', 'required');
        if($this->form_validation->run()){
            $message = $this->input->post('message');
            $username = $this->session->userdata('username');

        
        $this->load->model('messages_model');
        $this->messages_model->insertMessage($username, $message);

        redirect(base_url()."index.php/user/view/".$username);
    }else{
        $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect(base_url() . 'index.php/message');
    }
}   
}