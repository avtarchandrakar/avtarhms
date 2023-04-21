<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Billing_Item_Group extends CI_Controller
{
	public function billing_group_form()
	{
		$data = $this->login_details();
		$data['pagename'] = "Billing Item Group";
		$data['all_value'] = $this->Billing_group->get_all_billing_group();
		$this->load->view('billing_group_list', $data);
	}
	public function add_billing_group()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Billing Item Group";
		$data['department'] = $this->Master_model->get_department();
		$this->load->view('add_billing_group', $data);
	}

	
	public function edit_billing_group()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Billing Item Group";
		$data['edid'] = $this->input->get('edid');
		$data['a_value'] = $this->Billing_group->get_a_billing_group($data['edid']);
		$this->load->view('edit_billing_group', $data);
	}
	public function insert_billing_groups(){
		echo $this->Billing_group->insert_billing_groups();
	}
	public function update_billing_group(){
		echo $this->Billing_group->update_billing_group();
	}
	public function delete_billing_group(){
		echo $this->Billing_group->delete_billing_group();;
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