<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchfriend extends CI_Controller {

	public function index()
	{
			
			$lookinFor = $this->input->post('gender');
			$age_frm = $this->input->post('age_frm');
			$age_to = $this->input->post('age_to');
			$full_name = $this->input->post('full_name');
			$email = $this->input->post('email');
			$martial_status = $this->input->post('martial_status');
			$smoking = $this->input->post('smoking');
			$country = $this->input->post('country');
			$city = $this->input->post('city');
			
			$search_row = $this->member_model->search_member_advance($lookinFor,$age_frm,$age_to,$full_name,$email,$martial_status,$smoking,$country,$city);
			$data['search_row'] = $search_row;
			$data['title'] = 'Search Profiles';
			$this->load->view('search_view',$data);
			return;
		
	}
}
