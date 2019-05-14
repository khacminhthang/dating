<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_Profile extends CI_Controller {

	public function index()
	{
		$data['title']= SITE_NAME.': Search Profile';
		$this->load->view('search_profile_view',$data);
	}
}
