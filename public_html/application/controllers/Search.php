<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function index() {
        $user = $this->session->userdata('username');
        $data = array('name' => $user);
        $this->load->view('ViewSearch', $data);
    }


    //dosearch function which looks for a message which contains
    // a string submitted in the form
    public function dosearch(){
        $this->load->model('messages_model');
        $string = $_GET["string"];
        $data = $this->messages_model->searchMessages($string);


        $user = $this->session->userdata('username');
        $test = true;

        if($data == null){
            redirect(base_url()."index.php/search");
            return;}    
        $matchMessages = array("results" => $data,
                                "name" => $user,
                                "test" => $test,
                                "Header" => "The results of your search: ");
        $this->load->view('ViewMessages', $matchMessages);
    }

}

