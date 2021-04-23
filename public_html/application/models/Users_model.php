<?php

class Users_model extends CI_Model {
    //load our database
    public function __construct() {$this->load->database();}

    //a function that checks if the 
    //$username with given $password exists
    public function checkLogin($username, $password){
        $pass = sha1($password);
        $sql = 'SELECT * FROM Users WHERE username = ? AND password = ?';
        $query = $this->db->query($sql, array($username, $pass));
        if($query->num_rows() > 0){
            return true;
        }else
        {
            return false;
        }
    }

    //This function check if $follower has $followed
    public function isFollowing($follower, $followed){
        $sql = "SELECT * FROM User_Follows WHERE follower_username = ? AND followed_username = ?";
        $query = $this->db->query($sql, array($follower, $followed));
        if($query->num_rows() > 0){
            return true;
        }else
        {
            return false;
        }
    }

    //a function that inserts a new relations between $follower and $followed
    public function follow($follower, $followed){
        $sql = "INSERT INTO User_Follows VALUES (?, ?)";
        $this->db->query($sql, array($follower, $followed));
    }
}