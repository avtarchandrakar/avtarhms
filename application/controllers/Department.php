<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Department extends CI_Controller
{
	public function department_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "Department";
		$data['all_value'] = $this->Department_model->get_all_department();
		$this->load->view('department_list', $data);
	}
	public function add_department()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Department";
		$data['department'] = $this->Master_model->get_department();
		$this->load->view('add_department', $data);
	}

	
	public function edit_department()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Department";
		$data['edid'] = $this->input->get('edid');
		$data['a_value'] = $this->Department_model->get_a_departments($data['edid']);
		$this->load->view('edit_department', $data);
	}
	public function insert_department(){
		echo $this->Department_model->insert_department();
	}
	public function update_department(){
		echo $this->Department_model->update_department();
	}
	public function delete_department(){
		echo $this->Department_model->delete_department();;
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