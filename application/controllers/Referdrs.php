<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Referdrs extends CI_Controller
{
	public function referdr_form()
	{
		$data = $this->login_details();
		$data['pagename'] = "Refer Doctor";
		$data['all_value'] = $this->Referdr->get_all_cons();
		$this->load->view('referdr_list', $data);
	}
	public function add_referdr()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Refer Doctor";
		$data['department'] = $this->Master_model->get_department();
		$this->load->view('add_referdr', $data);
	}
	public function edit_referdr()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Refer Doctor";
		$data['department'] = $this->Master_model->get_department();
		$data['edid'] = $this->input->get('edid');
		$data['a_value'] = $this->Referdr->get_a_department($data['edid']);

		//echo "<pre>"; print_r($data['a_value']); echo "<pre>"; exit(0);
		$this->load->view('edit_referdr', $data);
	}
	public function insert_referdrs(){
		echo $this->Referdr->insert_referdrs();
	}
	public function update_referdr(){
		echo $this->Referdr->update_referdr();
	}
	public function delete_referdr(){
		echo $this->Referdr->delete_referdr();;
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