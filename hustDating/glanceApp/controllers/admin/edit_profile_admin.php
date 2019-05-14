<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//  edit ho so nguoi dung
class Edit_Profile_Admin extends CI_Controller {
	
	public function edit_profile_detail($username)
	{
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		$profile_row = $this->member_model->get_member_by_username($username);
		$data['row'] = $profile_row;
		$this->form_validation->set_rules('name', 'Name', 'trim|required|secure');
		$this->form_validation->set_rules('looking_for', 'looking for', 'trim|required|secure');	
		$this->form_validation->set_rules('looking_age_from', 'age between', 'trim|required|secure');
		$this->form_validation->set_rules('looking_age_to', 'age between', 'trim|required|secure');
		$this->form_validation->set_rules('looking_marital_status', 'marital status', 'trim|required|secure');
		$this->form_validation->set_rules('looking_country', 'Country', 'trim|required|secure');
		$this->form_validation->set_rules('looking_city', 'City', 'trim|required|secure');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|secure');
		
		$this->form_validation->set_rules('phone', 'Phone', 'trim|secure|numeric');
		$this->form_validation->set_rules('relationship_status', 'relationship_status', 'trim|secure');
		$this->form_validation->set_rules('marital_status', 'marital_status', 'trim|secure');
		$this->form_validation->set_rules('dob', 'dob', 'trim|secure');
		$this->form_validation->set_rules('life_style', 'life_style', 'trim|secure');
		$this->form_validation->set_rules('smoking', 'smoking', 'trim|secure');
		$this->form_validation->set_rules('drinking', 'drinking', 'trim|secure');
		$this->form_validation->set_rules('education', 'education', 'trim|secure');
		$this->form_validation->set_rules('country', 'country', 'trim|secure');	
		$this->form_validation->set_rules('city', 'city', 'trim|secure');	
		$this->form_validation->set_rules('about_me', 'about_me', 'trim|secure');	
	
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = SITE_NAME.': Edit Profile';
			$this->load->view('admin/edit_profile_view',$data);
			return;
		}
		$dob = date("Y-m-d",strtotime($this->input->post('dob')));
		$member_array = array(
								'name' => $this->input->post('name'),
								'looking_for' => $this->input->post('looking_for'),
								'looking_age_from' => $this->input->post('looking_age_from'),
								'looking_age_to' => $this->input->post('looking_age_to'),
								'looking_marital_status' => $this->input->post('looking_marital_status'),
								'looking_country' => $this->input->post('looking_country'),
								'looking_city' => $this->input->post('looking_city'),
								'phone' => $this->input->post('phone'),
								'relationship_status' => $this->input->post('relationship_status'),
								'marital_status' => $this->input->post('marital_status'),
								'dob' => $dob,
								'life_style' => $this->input->post('life_style'),
								'smoking' => $this->input->post('smoking'),
								'drinking' => $this->input->post('drinking'),
								'education' => $this->input->post('education'),
								'country' => $this->input->post('country'),
								'city' => $this->input->post('city'),
								'about_me' => $this->input->post('about_me')
		);
		
		if (!empty($_FILES['photo']['name'])){
			
			$config['upload_path'] = realpath(APPPATH . '../glancePublic/uploads/member_images/');
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;
			$config['max_size'] = 12000;
			$config['file_name'] = $this->session->userdata('member_id').time();
			$this->upload->initialize($config);
			$real_path = realpath(APPPATH . '../glancePublic/uploads/member_images/');
			
			if ($this->upload->do_upload('photo')){
				if($profile_row->photo){
					@unlink($real_path.'/'.$profile_row->photo);	
					@unlink($real_path.'/thumb_'.$profile_row->photo);	
				}
			}
			
			$image = array('upload_data' => $this->upload->data());	
			$image_name = $image['upload_data']['file_name'];
			
			
			//Image resizing
			$objImg = new Simple_Image();
			$small_img = 'thumb_'.$image_name;
			$objImg->load($real_path.'/'.$image_name);						
			$objImg->resizeToHeight(80);
			$objImg->save($real_path.'/'.$small_img);
			$member_array['photo']=$image_name;
			$this->session->set_userdata('photo', $image_name);
		}

		$this->member_model->update_member($this->input->post('id'),$member_array);
		//redirect(base_url().'admin/edit_profile_admin/edit_profile_detail/'.$username,'');
		redirect(base_url().'admin/edit_profile_admin/edit_profile_detail/'.$username,'');
	}
		
}
