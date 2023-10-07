<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class insurance extends CI_Controller
{
	public function insurance_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "insurance";
		$data['all_value'] = $this->Insurance_model->get_all_insurance();
		$this->load->view('insurance_list', $data);
	}
	public function add_insurance()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add insurance";
		$data['tariff_list'] = $this->Insurance_model->get_insurance();
		$this->load->view('add_insurance', $data);
	}



	
	public function edit_insurance()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit insurance";
		$data['edid'] = $this->input->get('edid');
		$data['tariff_list'] = $this->Insurance_model->get_insurance();
		$data['a_value'] = $this->Insurance_model->get_a_insurances($data['edid']);
		$this->load->view('edit_insurance', $data);
	}
	public function insert_insurance(){
		echo $this->Insurance_model->insert_insurance();
	}
	public function update_insurance(){
		echo $this->Insurance_model->update_insurance();
	}
	public function delete_insurance(){
		echo $this->Insurance_model->delete_insurance();;
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