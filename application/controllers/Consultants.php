<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Consultants extends CI_Controller
{
	public function consultant_form()
	{
		$data = $this->login_details();
		$data['pagename'] = "Consultants";
		$data['all_value'] = $this->Consultant_model->get_all_cons();
		$this->load->view('consultant_list', $data);
	}
	public function add_consultant()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Consultant";
		$data['department'] = $this->Master_model->get_department();
		$this->load->view('add_consultant', $data);
	}
	public function edit_consultant()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Consultant";
		$data['department'] = $this->Master_model->get_department();
		$data['edid'] = $this->input->get('edid');
		$data['a_value'] = $this->Consultant_model->get_a_department($data['edid']);

		//echo "<pre>"; print_r($data['a_value']); echo "<pre>"; exit(0);
		$this->load->view('edit_consultant', $data);
	}
	public function insert_consultants(){
		echo $this->Consultant_model->insert_consultants();
	}
	public function update_consultant(){
		echo $this->Consultant_model->update_consultant();
	}
	public function delete_consultant(){
		echo $this->Consultant_model->delete_consultant();;
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