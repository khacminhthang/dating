<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index($username){
		if($username==''){
			redirect(base_url().'user/login');
			exit;
		}

		$data['show_friend_button'] = true;
		$profile_row = $this->member_model->get_member_by_username($username);
		
		if($profile_row){
			$is_already_friend = $this->friend_model->friendship_validations($profile_row->id);
			$is_already_favourite = $this->friend_model->friendship_favourite($profile_row->id);
			
			$data['title'] = SITE_NAME.': '.$profile_row->name;
			$data['msg'] = '';
			$data['is_already_friend'] = $is_already_friend;
			$data['is_already_favourite'] = $is_already_favourite;
			$data['profile_views'] = $profile_views;
			$data['row'] = $profile_row;
			if(($this->session->userdata('username')!=$username)) {
				if($this->session->userdata('username')) {
					$isFriend = $this->friend_model->isfriends($this->session->userdata('member_id'),$profile_row->id);
				} else {
					$isFriend = FALSE;
				}
				/// Email Settings
				if(@$privacy_row->email_setting == 'friends') {
					
					if($isFriend) {
						
						$showEmail = true;
						
					} else {
						
						$showEmail = false;
						
					}
					
				} else if(@$privacy_row->email_setting == 'me') {
					
					$showEmail = false;
					
				} else {
					
					$showEmail = true;
					
				}
				
				/// Phone Settings
				if(@$privacy_row->phone_setting == 'friends') {
					
					if($isFriend) {
						
						$showPhone = true;
						
					} else {
						
						$showPhone = false;
						
					}
					
				} else if(@$privacy_row->phone_setting == 'me') {
					
					$showPhone = false;
					
				} else {
					
					$showPhone = true;
					
				}
				
				/// DOB Settings
				if(@$privacy_row->dob_setting == 'friends') {
					
					if($isFriend) {
						
						$showDOB = true;
						
					} else {
						
						$showDOB = false;
						
					}
					
				} else if(@$privacy_row->dob_setting == 'me') {
					
					$showDOB = false;
					
				} else {
					
					$showDOB = true;
					
				}
				
				/// Location Settings
				if(@$privacy_row->location_setting == 'friends') {
					
					if($isFriend) {
						
						$showLocation = true;
						
					} else {
						
						$showLocation = false;
						
					}
					
				} else if(@$privacy_row->location_setting == 'me') {
					
					$showLocation = false;
					
				} else {
					
					$showLocation = true;
					
				}
				
				/// Message Settings
				if(@$privacy_row->msg_setting == 'friends') {
					
					if($isFriend) {
						
						$showMessage = true;
						
					} else {
						
						$showMessage = false;
						
					}
					
				} else {
					
					$showMessage = true;
					
				}
				
				/// Gallery Settings
				if(@$privacy_row->gallery_setting == 'friends') {
					
					if($isFriend) {
						
						$showGallery = true;
						
					} else {
						
						$showGallery = false;
						
					}
					
				} else if(@$privacy_row->gallery_setting == 'me') {
					
					$showGallery = false;
					
				} else {
					
					$showGallery = true;
					
				}
				
				$data['email_setting'] = $showEmail;
				$data['phone_setting'] = $showPhone;
				$data['dob_setting'] = $showDOB;
				$data['location_setting'] = $showLocation;
				$data['msg_setting'] = $showMessage;
				$data['gallery_setting'] = $showGallery;
				
				$this->load->view('profile_others_view', $data);
				
			} else
				$this->load->view('profile_view', $data);
		} else {
			redirect(base_url().'profile/'.$this->session->userdata('username'));
			exit;
		}
		
	}
		
}
