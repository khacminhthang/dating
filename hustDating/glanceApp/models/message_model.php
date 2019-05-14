<?php
class Message_Model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    // them tin nhan
    public function add_message($data) {
        $return = $this->db->insert('users_messages', $data);
        if((bool) $return === TRUE) {
            return $this->db->insert_id();
        } else {
            return $return;
        }
    }

    // lay tat ca tin nhan

    public function get_all_messages($sender_id,$reciever_id){
				
		$Q = $this->db->query("SELECT m.name, m.photo, msg.message, msg.date_send FROM users_messages msg
                INNER JOIN member m 
                ON msg.sender_id = m.id 
                WHERE (msg.sender_id = ".$sender_id." and msg.reciever_id = ".$reciever_id.") 
                OR (msg.sender_id = ".$reciever_id." AND msg.reciever_id = ".$sender_id.") 
                ORDER BY msg.date_send ASC");
		
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
    
    // lay tat ca nguoi gui va nhan cua nguoi dung 
    public function getAllSenderRecieverOfUser($member_id){
		
		$Q = $this->db->query("SELECT DISTINCT sender_id, reciever_id
								FROM users_messages
								WHERE sender_id = ".$member_id." or reciever_id = ".$member_id."
								ORDER BY date_send ASC");
		
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
    
    // lay nguoi dung voi doan hoi thoai cuoi
    public function getUserWithLatestConversation($member_id){
		
		$Q = $this->db->query("SELECT sender_id, reciever_id
								FROM users_messages
								WHERE sender_id = ".$member_id." or reciever_id = ".$member_id."
								ORDER BY date_send desc");
		
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
    
    // lay tat ca ho so tin nhan
    public function get_all_profiles_messages(){
		
		$Q = $this->db->query("SELECT * FROM users_messages ORDER BY date_send ASC");
		
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
    
    // xoa tin nhan
	public function delete_message($id){
		$Q = $this->db->query("Delete FROM `users_messages` WHERE messages_id = '".$id."'");
        $return = 1;
        return $return;
		
	}

}

?>