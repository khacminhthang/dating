<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function index()
	{
		$all_members_result = $this->member_model->get_all_member_front(20,0);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|secure|alpha_numeric|min_length[5]|is_unique[member.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|secure|min_length[6]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|secure|valid_email|is_unique[member.email]');
		
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|secure');
		$this->form_validation->set_rules('seeking_for', 'Seeking For', 'trim|required|secure');
		$this->form_validation->set_rules('birth_month', 'Birth Month', 'trim|required|secure');
		$this->form_validation->set_rules('birth_day', 'Birth Day', 'trim|required|secure');
		$this->form_validation->set_rules('birth_year', 'Birth Year', 'trim|required|secure');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|secure');
		
		$data['all_members_result'] = $all_members_result;
		if ($this->form_validation->run() === FALSE) {
			$data['title']= 'HUST Dating Website';
			$this->load->view('home_view',$data);
			return;
		}
		
		// $verification_code = md5($this->input->post('email').time());
		$password = md5(strip_tags($this->input->post('password')));
		
		$member_array = array(
								'username' => strip_tags($this->input->post('username')),
								'password' => $password,
								'email' => strip_tags($this->input->post('email')),
								'gender' => strip_tags($this->input->post('gender')),
								'looking_for' => strip_tags($this->input->post('seeking_for')),
								'dob' => $this->input->post('birth_year').'-'.$this->input->post('birth_month').'-'.$this->input->post('birth_day'),
								'dated' => date("Y-m-d H:i:s"),
								'verification_code' => $verification_code,
								'country' => strip_tags($this->input->post('country'))
		);
		$this->member_model->add_member($member_array);
		$config = array();
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
	
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->from($row_email->from_email, $row_email->from_name);
		$this->email->to($this->input->post('email'));
		$this->email->subject($row_email->email_subject);
		$this->email->message($mail_message);					
		$this->email->send();
		redirect(base_url().'verification');
	}
	
}