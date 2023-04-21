<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Location extends CI_Controller
{
	public function state()
	{
		$data = $this->login_details();
		$data['pagename'] = "State";
		$data['all_value'] = $this->Master_model->get_all_state();
		$this->load->view('state_list', $data);
	}
	public function add_state()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add State";
		$this->load->view('add_state', $data);
	}
	public function edit_state()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit State";
		$data['edid'] = $this->input->get('edid');
		$data['a_value'] = $this->Master_model->get_a_state($data['edid']);

		//echo "<pre>"; print_r($data['a_value']); echo "<pre>"; exit(0);
		$this->load->view('edit_state', $data);
	}
	public function insert_state(){
		echo $this->Master_model->insert_state();
	}
	public function update_state(){
		echo $this->Master_model->update_state();
	}
	public function delete_state(){
		echo $this->Master_model->delete_state();;
	}
	public function city()
	{
		$data = $this->login_details();
		$data['pagename'] = "City";
		$data['all_value'] = $this->Master_model->get_all_city();
		$data['get_active_state'] = $this->Master_model->get_active_state();
		$this->load->view('city_list', $data);
	}
	public function add_city()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add City";
		$data['get_active_state'] = $this->Master_model->get_active_state();
		$this->load->view('add_city', $data);
	}
	public function edit_city()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit City";
		$data['edid'] = $this->input->get('edid');
		$data['get_active_state'] = $this->Master_model->get_active_state();
		$data['a_value'] = $this->Master_model->get_a_city($data['edid']);
		//echo "<pre>"; print_r($data['a_value']); echo "<pre>"; exit(0);
		$this->load->view('edit_city', $data);
	}
	public function insert_city(){
		echo $this->Master_model->insert_city();
	}
	public function update_city(){
		echo $this->Master_model->update_city();
	}
	public function delete_city(){
		echo $this->Master_model->delete_city();;
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