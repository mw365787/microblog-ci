<?php

class Messages_model extends CI_Model {
    //load our database
    public function __construct() {$this->load->database();}

    //returns all messages written by $name
    public function getMessagesByPoster($name){
        $sql = "SELECT * FROM Messages WHERE user_username = ? ORDER BY posted_at DESC";
        $query = $this->db->query($sql, $name);
        return $query->result_array();
    }

    //search for a message with a given string
    public function searchMessages($string){
        $sql = 'SELECT * FROM Messages WHERE match(text) against(? IN BOOLEAN MODE)ORDER BY posted_at DESC LIMIT 10';
        $query = $this->db->query($sql, $string);
        return $query->result_array();
        //return $query->result_array();
    }

    //inserts a message into database
    public function insertMessage($poster, $string){
        $sql = "INSERT INTO Messages (user_username, text, posted_at) VALUES(?, ?, ?)";
        $date = date("Y-m-d h:i:s");
        $this->db->query($sql, array($poster, $string, $date));
    }

    //this function returns messages by all the followers of $name
    public function getFollowedMessages($name){
            $sql = "SELECT DISTINCT User_Follows.follower_username, Messages.user_username, Messages.text, Messages.posted_at, Messages.id FROM Messages 
            INNER JOIN Users ON Users.username = Messages.user_username 
            INNER JOIN User_Follows ON Users.username = User_Follows.followed_username
            WHERE User_Follows.follower_username = ? ORDER BY Messages.posted_at DESC";
    
            $query = $this->db->query($sql, $name);
            return $query->result_array();    
    }

}