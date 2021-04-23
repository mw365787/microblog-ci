<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function index() {
        echo "Please insert username!";
    }

    //view user and messages he sent
    //$ID => user
    public function view($ID = null) {

        //get messages by $user
        $this->load->model('messages_model');
        $data = $this->messages_model->getMessagesByPoster($ID);
        $viewMessage = array("results" => $data);

        //get current session $user
        $this->load->model('users_model');
        $user = $this->session->userdata('username');
		if($user != $ID){
			$test = $this->users_model->isFollowing($user, $ID);        //$user = session user, $ID = followed
		}else
		{
			$test = true;
        }
        $viewMessage['nameFollow'] = $ID;
        $viewMessage['Header'] = $ID."'s page:"; //a name that will show on the top
        $viewMessage['test'] = $test;   //to show/hide button
		$viewMessage['name'] = $user;   //current username
        //we gotta pass $data from above
        $this->load->view('ViewMessages', $viewMessage);
    }


    public function login(){
        $this->load->view('ViewLogin');
    }

    //process the form submission and attempt to login
   public function doLogin(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //load users_model and checkLogin
            $this->load->model('users_model');
            if($this->users_model->checkLogin($username, $password))
            {
                $session_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'index.php/user/view/'.$username);
            }else
            {   
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect(base_url() . 'index.php/user/login');
            }
        }else{
            //false
            $this->login();
    }

}

//logout and clear the session
public function logout(){
    $this->session->unset_userdata('username');
    redirect(base_url()."index.php/user/login");
}

//get all the messages people that $user follows
public function feed($name){
    $this->load->model("messages_model");
    $output = $this->messages_model->getFollowedMessages($name);
    $feed = array("results" => $output);

    $this->load->model("users_model");
    $user = $this->session->userdata('username');
    $test = true;
    $feed['Header'] = $name."'s feed:";
    $feed['test'] = $test;
	$feed['name'] = $name;
    $this->load->view('ViewMessages', $feed);
}

public function follow($followed){
    $this->load->model("users_model");
    $follower = $this->session->userdata('username');
    if($this->users_model->isFollowing($follower, $followed)){
        echo "You already follow this user!";
    }else{
        $this->users_model->follow($follower, $followed);
        redirect(base_url()."index.php/user/view/".$followed);
    }
    
}

//searchbar at the top of the homepage handles simple search
public function searchBar(){
    $searchedUser = $this->input->get('searchedUser');
    $this->view($searchedUser);
}
}