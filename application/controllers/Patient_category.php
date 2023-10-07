<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Patient_category extends CI_Controller
{
	public function patient_category_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "Patient Category";
		$data['all_value'] = $this->Patient_category_model->get_all_patient_category();
		$this->load->view('patient_category_list', $data);
	}
	public function add_patient_category()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Patient Category";
		$data['tariff_list'] = $this->Patient_category_model->get_patient_category();
		$this->load->view('add_patient_category', $data);
	}



	
	public function edit_patient_category()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Patient Category";
		$data['edid'] = $this->input->get('edid');
		$data['tariff_list'] = $this->Patient_category_model->get_patient_category();
		$data['a_value'] = $this->Patient_category_model->get_a_patient_categorys($data['edid']);
		$this->load->view('edit_patient_category', $data);
	}
	public function insert_patient_category(){
		echo $this->Patient_category_model->insert_patient_category();
	}
	public function update_patient_category(){
		echo $this->Patient_category_model->update_patient_category();
	}
	public function delete_patient_category(){
		echo $this->Patient_category_model->delete_patient_category();;
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