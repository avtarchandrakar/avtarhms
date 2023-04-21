<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Slider extends CI_Controller
{
	public function index()
	{
		$data = $this->login_details();
		$data['pagename'] = "Slider";
		$data['all_value'] = $this->Master_model->get_all_slider();
		$this->load->view('slider_list', $data);
	}
	public function add_slider()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Slider";
		$this->load->view('add_slider', $data);
	}
	public function edit_slider()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Gallery";
		$data['edid']= $this->input->get('edid');
		$data['a_value'] = $this->Master_model->get_a_slider($data['edid']);
		$this->load->view('edit_slider', $data);
	}
	public function insert_slider(){
		echo $this->Master_model->insert_slider();
	}
	public function update_slider(){
		echo $this->Master_model->update_slider();
	}
	public function delete_slider(){
		echo $this->Master_model->delete_slider();;
	}

	//Login Deatils
	protected function login_details(){
		$this->require_login();
		$data['log_user_dtl'] = $this->Login_model->user_details();
		return $data;
	}
	protected function require_login(){
		$is_user_in = $this->session->userdata('is_user_in');
		if (isset($is_user_in) || $is_user_in == true) {
			return;
		} else {
			redirect('Login');
		}
	}
	protected function ajax_login() {
		$is_user_in = $this->session->userdata('is_user_in');
		if (isset($is_user_in) || $is_user_in == true) {
			return true;
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'You are not Logged in Now!! Please login again.'));
			return false;
		}
	}
}
?>