<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Tariff extends CI_Controller
{
	public function tariff_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "Tariff";
		$data['all_value'] = $this->Tariff_model->get_all_tariff();
		$this->load->view('tariff_list', $data);
	}
	public function add_tariff()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Tariff";
		$this->load->view('add_tariff', $data);
	}

	
	public function edit_tariff()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Tariff";
		$data['edid'] = $this->input->get('edid');
		$data['a_value'] = $this->Tariff_model->get_a_tariff($data['edid']);
		$this->load->view('edit_tariff', $data);
	}
	public function insert_tariff(){
		echo $this->Tariff_model->insert_tariff();
	}
	public function update_tariff(){
		echo $this->Tariff_model->update_tariff();
	}
	public function delete_tariff(){
		echo $this->Tariff_model->delete_tariff();;
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