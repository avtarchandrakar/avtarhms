<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Company extends CI_Controller
{
	public function company_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "company";
		$data['all_value'] = $this->Company_model->get_all_company();
		$this->load->view('company_list', $data);
	}
	public function add_company()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add company";
		$data['tariff_list'] = $this->Company_model->get_company();
		$this->load->view('add_company', $data);
	}



	
	public function edit_company()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit company";
		$data['edid'] = $this->input->get('edid');
		$data['tariff_list'] = $this->Company_model->get_company();
		$data['a_value'] = $this->Company_model->get_a_companys($data['edid']);
		$this->load->view('edit_company', $data);
	}
	public function insert_company(){
		echo $this->Company_model->insert_company();
	}
	public function update_company(){
		echo $this->Company_model->update_company();
	}
	public function delete_company(){
		echo $this->Company_model->delete_company();;
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