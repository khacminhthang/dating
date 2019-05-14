<?php
class Friend_Model extends CI_Model {
    public function __construct() {
	   $this->load->database();
    }
		
	public function get_all_frieds(){
		$this->db->select('*');
		$this->db->from('circle');
		$this->db->order_by('id','DESC');
		
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
		
	}
	
	public function add_friend($data) {
		  return $this->db->insert('circle', $data);		  
    }
	
	public function edit_friend($id, $data) {
		  $this->db->where('member_id', $id);
		  $this->db->where('friend_id', $this->session->userdata('member_id'));
		  $this->db->update('circle', $data);
		  
    }
	
	public function edit_friend_statuses($id, $data) {
		  $this->db->where('member_id', $this->session->userdata('member_id'));
		  $this->db->where('friend_id', $id);
		  $this->db->update('circle', $data);
		  
    }
	
	public function get_request_sent_friends_by_status($id,$status){
		$this->db->select('member.id, member.username, member.gender, member.dob, member.name, member.photo, member.city, member.country, circle.status');
		$this->db->from('member');
		$this->db->join('circle', 'member.id = circle.friend_id', 'inner');
		$this->db->where("circle.status", $status);
		$this->db->where("circle.member_id", $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function get_request_received_friends_by_status($id,$status){
		$this->db->select('member.id, member.username, member.gender, member.dob, member.name, member.photo, member.city, member.country, circle.status');
		$this->db->from('member');
		$this->db->join('circle', 'member.id = circle.member_id', 'inner');
		$this->db->where("circle.status", $status);
		$this->db->where("circle.friend_id", $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function get_all_approved_friends($id){
		
		$Q = $this->db->query("SELECT member.*, FLOOR(DATEDIFF (NOW(), member.dob)/365) AS mAge
								FROM member
								INNER JOIN circle
								ON member.id = circle.friend_id
								WHERE circle.status = 'approved' AND circle.member_id = ".$id."
								ORDER BY circle.dated ASC");
		
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function friendship_validations($id){
		$this->db->select('*');
		$this->db->from('circle');
		$this->db->where("friend_id", $id);
		$this->db->where("member_id", $this->session->userdata('member_id'));
		$this->db->where("status !=", 'discard');
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function get_friends_by_status($id,$status){
		$this->db->select('member.*');
		$this->db->from('member');
		$this->db->join('circle', 'member.id = circle.friend_id', 'inner');
		$this->db->where("circle.status", $status);
		$this->db->where("circle.member_id", $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function get_favourite_friends($id){
		$this->db->select('member.*');
		$this->db->from('member');
		$this->db->join('circle', 'member.id = circle.friend_id', 'inner');
		$this->db->where("circle.is_favourite", 'yes');
		$this->db->where("circle.member_id", $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function friendship_favourite($id){
		$this->db->select('*');
		$this->db->from('circle');
		$this->db->where("friend_id", $id);
		$this->db->where("member_id", $this->session->userdata('member_id'));
		$this->db->where("is_favourite", 'yes');
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function isfriends($mem_id, $mem_id2) {
		
		$Q = $this->db->query("SELECT *
								FROM circle
								WHERE status = 'approved' AND member_id = ".$mem_id." AND friend_id = ".$mem_id2."
							 ");
		
        if ($Q->num_rows > 0) {
            $row = $Q->row();
			$return = 1;
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
		
	}

}
?>
