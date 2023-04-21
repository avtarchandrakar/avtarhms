<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Master extends CI_Controller
{
	
	public function hobby_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All hobbies";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->all_hobby();
		$this->load->view('hobbies_list', $data);
	}

	public function insert_hobby(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		  $data = $this->Main_model->insert_hobby();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'hobby has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'hobby has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'hobby Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_hobby(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_hobby()){
		  $info = array( 'status'=>'success',
		  'message'=>'hobby has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function subject_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All Subject";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->all_subject();
		$this->load->view('subject_list', $data);
	}
	  public function add_subject()
	{
		$data = $this->login_details();
		$data['pagename'] = "Add Subject";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_type'] = $this->Main_model->get_all_type_list();
		$data['category'] = $this->Main_model->all_category();
		$data['subcategory'] = $this->Main_model->get_all_sub_cat_list();
		$data['class'] = $this->Main_model->all_class();
		$data['edit_value'] = $this->Main_model->all_subject();
		$this->load->view('add_subject', $data);
	}

	  public function edit_subject()
	{
		$data = $this->login_details();
		$data['pagename'] = "Edit Subject";
		$data['id'] = $this->input->get('id');;
		// $data['ct_id'] = $this->input->get('ct');
		$data['all_type'] = $this->Main_model->get_all_type_list();
		$data['category'] = $this->Main_model->all_category();
		$data['subcategory'] = $this->Main_model->get_all_sub_cat_list();
		$data['class'] = $this->Main_model->all_class();
		$data['edit_value'] = $this->Main_model->all_subject_id($data['id']);
		// print_r($data['edit_value']); die;
		$this->load->view('edit_subject', $data);
	}

	public function insert_subject(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		  $data = $this->Main_model->insert_subject();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'Subject has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'Subject has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Subject Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_subject(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_subject()){
		  $info = array( 'status'=>'success',
		  'message'=>'Subject has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }


	  public function class_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All Class";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->all_class();
		$data['all_type'] = $this->Main_model->get_all_type_list();
		$data['get_category'] = $this->Main_model->all_category();
		$data['get_sabcategory'] = $this->Main_model->get_all_sub_cat_list();
		$this->load->view('class_list', $data);
	}

	public function insert_class(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		  $data = $this->Main_model->insert_class();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'Class has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'Class has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Class Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_class(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_class()){
		  $info = array( 'status'=>'success',
		  'message'=>'Class has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }


	  public function category_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All Category";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->all_category();
		$data['all_type'] = $this->Main_model->get_all_type_list();
		$this->load->view('category_list', $data);
	}

	public function insert_category(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		  $data = $this->Main_model->insert_category();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'Category has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'Category has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Category Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_category(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_category()){
		  $info = array( 'status'=>'success',
		  'message'=>'Category has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	public function sub_cat_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All Sub Category List";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->get_all_sub_cat_list();
		$data['category'] = $this->Main_model->all_category();
		$this->load->view('sub_category_list', $data);
	}

	public function insert_sub_cat_list(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  
		  $data = $this->Main_model->insert_sub_cat_list();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'Sub Category has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'Sub Category has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Sub Category Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_sub_cat(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_sub_cat()){
		  $info = array( 'status'=>'success',
		  'message'=>'Sub Category has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	public function city_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All City List";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->get_all_city_list();
		// $data['category'] = $this->Main_model->all_city_category();
		$this->load->view('city_list', $data);
	}

	public function insert_city_list(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$data = $this->Main_model->insert_city_list();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'City has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'City has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'City Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_city(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_city()){
		  $info = array( 'status'=>'success',
		  'message'=>'City has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	
	public function type_list()
	{
		$data = $this->login_details();
		$data['pagename'] = "All Course Type List";
		$data['ct_id'] = $this->input->get('ct');
		$data['all_value'] = $this->Main_model->get_all_type_list();
		// $data['all_city'] = $this->Main_model->get_all_city_list();
		$this->load->view('course_type', $data);
	}

	public function insert_type_list(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  
		  $data = $this->Main_model->insert_type_list();
		  if($data == 1){
		  $info = array( 'status'=>'success',
		  'message'=>'Course Type has been Inserted successfully!'
		  );
		  }else if($data == 2){
			$info = array( 'status'=>'success',
			'message'=>'Course Type has been Updated successfully!'
			);
		  }
		  else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Course Type Already Resigtered'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function delete_type(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if($data = $this->Main_model->delete_type()){
		  $info = array( 'status'=>'success',
		  'message'=>'Course Type has been Deleted successfully!'
		  );
		  }else{ 
			$info = array( 'status'=>'error',
			  'message'=>'Some problem Occurred!! please try again'
			);
		  } 
		  echo json_encode($info);
		}
	  }

	  public function get_category_by_type(){
		  $data = $this->Main_model->get_category_by_type();
		  echo json_encode($data);
	  }
	  public function get_subcat_by_cat(){
		  $data = $this->Main_model->get_subcat_by_cat();
		  echo json_encode($data);
	  }



	  
	//==========================Details===========================//
	protected function login_details()
	{
		$this->require_login();
		$data['log_user_dtl'] = $this->Login_model->user_details();
		return $data;
	}
	//=========================/Details===========================//

	//======================Login Validation======================//
	protected function require_login()
	{
		$is_user_in = $this->session->userdata('is_user_in');
		if (isset($is_user_in) || $is_user_in == true) {
			return;
		} else {
			redirect('Login');
		}
	}

	protected function ajax_login()
	{
		$is_user_in = $this->session->userdata('is_user_in');
		if (isset($is_user_in) || $is_user_in == true) {
			return true;
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'You are not Logged in Now!! Please login again.'));
			return false;
		}
	}
}
