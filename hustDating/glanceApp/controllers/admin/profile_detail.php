<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_Detail extends CI_Controller {
	
	public function profile($username){
		
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		$profile_row = $this->member_model->get_member_by_username($username);
		
		if($profile_row){
			$is_already_friend = $this->friend_model->friendship_validations($profile_row->id);
			$is_already_favourite = $this->friend_model->friendship_favourite($profile_row->id);
			
			$data['title'] = SITE_NAME.': '.$profile_row->name;
			$data['msg'] = '';
			$data['profile_views'] = $profile_views;
			$data['row'] = $profile_row;
			$data['comment_row'] = $comment_row;
			$this->load->view('admin/profile_detail_view', $data);
		} else {
			redirect(base_url().'admin/profiles_lists');
			exit;
		}
		
	}
	//  xoa ho so
	public function profile_delete($id) {
		
		$rs = $this->member_model->delete_member($id);
		$this->session->set_flashdata('msg', 'Profile Deleted successfully.');
		redirect(base_url()."admin/profiles_lists");
		
	}
	
	// thong bao trang thai ho so
	public function profile_sts($id,$sts) {
		
		$member_array = array(
								'sts' => $sts,
		);
		
		$this->member_model->update_member($id,$member_array);
		$this->session->set_flashdata('msg', 'Profile Updated Successfully.');
		redirect(base_url()."admin/profiles_lists");
	}
	
	// xoa binh luan
	public function user_comment_delete($username,$id) {
		
		$rs = $this->comments_model->delete_comment($id);
		$this->session->set_flashdata('msg', 'Comment Deleted successfully.');
		redirect(base_url()."admin/profile_detail/profile/".$username,'');
		return;
	}
		
}
