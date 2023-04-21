<?php date_default_timezone_set('Asia/Kolkata');
class Master_model extends CI_model{
  	//State
	public function get_all_state(){
		$this->db->select('*');
	  	$this->db->order_by('name');
	  	$res = $this->db->get('state_master')->result();
	  	return $res;
	}
	
	public function get_department(){
		$this->db->select('*');
		$this->db->where('mtype', 'department');
		$this->db->where('company_id', '1');
  	$this->db->order_by('name');
  	$res = $this->db->get('m_master')->result();
  	return $res;
	}

	public function get_item_group(){
		$this->db->select('*');
		$this->db->where('company_id', '1');
  	$this->db->order_by('name');
  	$res = $this->db->get('tbl_item_group')->result();
  	return $res;
	}

	public function get_a_state($edid){
		$this->db->select('*');
		$this->db->where('id',$edid);
	  	$res = $this->db->get('state_master')->result();
	  	return $res;
	}


  	public function insert_state(){
    	$data = array();
      	$s_data = array(
        "name" => $this->input->post('m_state_name'),
        "status" => $this->input->post('m_state_status'),
        "m_state_added_on" => date('Y-m-d H:i'),
      );
      $set = $this->db->insert('state_master',$s_data);
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Inserted Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
    }
    public function update_state(){
    $data = array();
      $s_data = array(
        "name" => $this->input->post('m_state_name'),
        "status" => $this->input->post('m_state_status'),
      );
      $this->db->where('id',$this->input->post('m_state_id'));
      $set = $this->db->update('state_master',$s_data);
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Update Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
    }
    public function delete_state(){
      $this->db->where('id', $this->input->post('delete_id'));
      $set = $this->db->delete('state_master');
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Deleted Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
    }
    //City
	public function get_all_city(){
		$this->db->select('master_city.*,state_master.name as state_name');
		$this->db->join('state_master', 'state_master.id = master_city.state_id','left');
	  	$this->db->order_by('master_city.name');
	  	$res = $this->db->get('master_city')->result();
	  	return $res;
	}
	public function get_a_city($edid){
		$this->db->select('*');
		$this->db->where('id',$edid);
	  	$res = $this->db->get('master_city')->result();
	  	return $res;
	}
  	public function insert_city(){
    	$data = array();
      	$s_data = array(
	        "name" => $this->input->post('m_city_name'),
	        "state_id" => $this->input->post('m_city_state'),
	        "status" => $this->input->post('m_city_status'),
	        "m_city_added_on" => date('Y-m-d H:i'),
	      );
      $set = $this->db->insert('master_city',$s_data);
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Inserted Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
    }
    public function update_city(){
    $data = array();
      $s_data = array(
        "name" => $this->input->post('m_city_name'),
        "state_id" => $this->input->post('m_city_state'),
        "status" => $this->input->post('m_city_status'),
      );
      $this->db->where('id',$this->input->post('m_city_id'));
      $set = $this->db->update('master_city',$s_data);
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Update Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
    }
    public function delete_city(){
      $this->db->where('id', $this->input->post('delete_id'));
      $set = $this->db->delete('master_city');
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Deleted Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
    }
  	//Country State City
  	public function get_active_country(){
		$this->db->select('*');
    	$this->db->where('m_country_status','1');
    	$this->db->order_by('m_country_name');
    	$res = $this->db->get('master_country_tbl')->result();
    	return $res;
	}
	public function get_active_state(){
		$this->db->select('*');
  	$this->db->where('status','1');
  	$this->db->order_by('name');
  	$res = $this->db->get('state_master')->result();
  	return $res;
	}
	public function get_active_city(){
		$this->db->select('*');
    	$this->db->where('m_city_status','1');
    	$this->db->where('m_city_state','1');
    	$this->db->order_by('m_city_name');
    	$res = $this->db->get('master_city_tbl')->result();
    	return $res;
	}
	public function get_active_area(){
		$this->db->select('*');
    	$this->db->where('m_area_status','1');
    	$this->db->where('m_area_city',$this->input->post('m_branch_city'));
    	$this->db->order_by('m_area_name');
    	$res = $this->db->get('master_area_tbl')->result();
    	return json_encode($res);
	}
	public function get_all_slider(){
		$this->db->select('*');
    	$this->db->order_by('m_slider_id','DESC');
    	$res = $this->db->get('master_slider_tbl')->result();
    	return $res;
	}
	public function get_a_slider($edid){
		$this->db->select('*');
		$this->db->where('m_slider_id',$edid);
    	$res = $this->db->get('master_slider_tbl')->result();
    	return $res;
	}
	public function insert_slider(){
		$data = array();
		if (!empty($_FILES['m_slider_image']['name'])) {
	      $config['file_name'] = $_FILES['m_slider_image']['name'];
	      $config['upload_path'] = 'uploads/slider';
	      $config['allowed_types'] = 'jpg|jpeg|png';
	      $config['remove_spaces'] = false;
	      //Load upload library and initialize configuration
	      $this->load->library('upload', $config);
	      $this->upload->initialize($config);
	      if ($this->upload->do_upload('m_slider_image')) {
	        $m_slider_image = $config['file_name'];
	      }
	    } 
	    else{
	      $m_slider_image = '';
	    }
	    $s_data = array(
	      "m_slider_title" => $this->input->post('m_slider_title'),
	      "m_slider_status" => $this->input->post('m_slider_status'),
	      "m_slider_image" => $m_slider_image,
	      "m_slider_added_on" => date('Y-m-d H:i'),
	    );
	    $set = $this->db->insert('master_slider_tbl',$s_data);
	    if(!empty($set)){
	    	$data['status'] = 'success';
	    	$data['message'] = 'Inserted Successfully!';
	    }
	    else{
	    	$data['status'] = 'fail';
	    	$data['message'] = 'Somthing went wrong!';
	    }
    	return json_encode($data);
  	}
  	public function update_slider(){
		$data = array();
		if (!empty($_FILES['m_slider_image']['name'])){
	      $config['file_name'] = $_FILES['m_slider_image']['name'];
	      $config['upload_path'] = 'uploads/slider';
	      $config['allowed_types'] = 'jpg|jpeg|png';
	      $config['remove_spaces'] = false;
	      //Load upload library and initialize configuration
	      $this->load->library('upload', $config);
	      $this->upload->initialize($config);
	      if ($this->upload->do_upload('m_slider_image')) {
	        $m_slider_image = $config['file_name'];
	      }
	    } 
	    else{
	      $m_slider_image = $this->input->post('m_slider_images');
	    }
	    $s_data = array(
	      "m_slider_title" => $this->input->post('m_slider_title'),
	      "m_slider_status" => $this->input->post('m_slider_status'),
	      "m_slider_image" => $m_slider_image,
	    );
	    $this->db->where('m_slider_id ',$this->input->post('m_slider_id'));
	    $set = $this->db->update('master_slider_tbl',$s_data);
	    if(!empty($set)){
	    	$data['status'] = 'success';
	    	$data['message'] = 'Update Successfully!';
	    }
	    else{
	    	$data['status'] = 'fail';
	    	$data['message'] = 'Somthing went wrong!';
	    }
    	return json_encode($data);
  	}
  	public function delete_slider(){
    	$this->db->where('m_slider_id', $this->input->post('delete_id'));
    	$set = $this->db->delete('master_slider_tbl');
    	if(!empty($set)){
	    	$data['status'] = 'success';
	    	$data['message'] = 'Deleted Successfully!';
	    }
	    else{
	    	$data['status'] = 'fail';
	    	$data['message'] = 'Somthing went wrong!';
	    }
	    return json_encode($data);
  	}
}
?>