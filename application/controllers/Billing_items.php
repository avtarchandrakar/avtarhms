<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Billing_items extends CI_Controller
{
	public function billing_item_form()
	{
		$data = $this->login_details();
		$data['pagename'] = "Billing Item";
		$data['all_value'] = $this->Billing_item->get_all_billing_item();
		$this->load->view('billing_item_list', $data);
	}
	public function add_billing_item()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Billing Item";
		
		$data['department'] = $this->Master_model->get_department();
		$data['item_group'] = $this->Master_model->get_item_group();
		$this->load->view('add_billing_item', $data);
	}

	
	public function edit_billing_item()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Billing Item";
		$data['edid'] = $this->input->get('edid');
		$data['department'] = $this->Master_model->get_department();
		$data['item_group'] = $this->Master_model->get_item_group();
		$data['a_value'] = $this->Billing_item->get_a_billing_item($data['edid']);
		$this->load->view('edit_billing_item', $data);
	}
	public function insert_billing_items(){
		echo $this->Billing_item->insert_billing_items();
	}
	public function update_billing_item(){
		echo $this->Billing_item->update_billing_item();
	}
	public function delete_billing_item(){
		echo $this->Billing_item->delete_billing_item();;
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