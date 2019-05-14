<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		
		redirect(base_url().'user/login');
		
	}
	
	//  dang nhap
	public function login(){
		
		$data['title'] = SITE_NAME.': Login';
		$data['msg'] = '';
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|secure');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|secure');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login_view', $data);
			return;
		}
		
		$password = md5($this->input->post('password'));
		
		$userRow = $this->member_model->authenticate_member($this->input->post('username'), $password);

		if(!$userRow){
			$data['msg'] = 'Wrong username or password provided';
			$this->load->view('login_view', $data);
			return;
		}
			
		if($userRow->sts=='inactive'){
			$data['msg'] = 'You have not yet verified your email address.';
			$this->load->view('login_view', $data);
			return;
		}
		if($userRow->sts=='blocked'){
			$data['msg'] = 'Your profile has been blocked.';
			$this->load->view('login_view', $data);
			return;
		}

		$user_data = array(
				'member_id' => $userRow->id,
				 'username' => $userRow->username,
				 'photo' => $userRow->photo,
				 'name' => $userRow->name,
				 'city' => $userRow->city,
				 'is_user_login' => TRUE);
		$this->session->set_userdata($user_data);
		
		if($userRow->sts=='inactive'){
			$this->member_model->update_member($userRow->id, array('first_login_date' => date("Y-m-d H:i:s"), 'last_login_date' => date("Y-m-d H:i:s"), 'sts' => 'active'));
		} else {
			$this->member_model->update_member($userRow->id, array('last_login_date' => date("Y-m-d H:i:s")));
		}
		
		redirect(base_url().'profile/'.$userRow->username, '');		
	}	

	// cai lai mat khau
	public function reset($vcode){
		$data['title'] = SITE_NAME.': Reset Password';
		$data['msg'] = '';
		if($vcode){
			
			$this->form_validation->set_rules('pass', 'Password', 'trim|required|secure');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('reset_view', $data);
				return;
			}
		
			$row = $this->member_model->authenticate_by_verification_code2($vcode);
			
			
			
			$pass=md5($this->input->post('pass'));
			if($row){
				$this->member_model->update_member($row->id,array('password'=>$pass));
				$data['title'] = SITE_NAME.': Login';
				$data['msg'] = 'Password has been changed successfully.';
				$this->load->view('login_view', $data);
				return;
			}else{
				redirect(base_url('user/login/?err'));
			}
		}
		else
			redirect(base_url('user/login?err1'));
	}
	
	// dang xuat
	public function logout() {
						
		$user_data = array(
		 'member_id' => '',
		 'username' => '',
		 'photo' => '',
		 'name' => '',
		 'is_user_login' => FALSE);
		  
		$this->session->set_userdata($user_data);
		$this->session->unset_userdata($user_data);
		redirect(base_url(), 'refresh'); 
	}
}