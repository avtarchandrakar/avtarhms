<?php date_default_timezone_set('Asia/Kolkata');
class Consultant_model extends CI_model{
  	//State
	public function get_all_cons(){
		$this->db->select('*');
	  	$this->db->order_by('name');
	  	$res = $this->db->get('tbl_cons_doct')->result();
	  	return $res;
	}
	public function get_a_department($edid){
		$this->db->select('*');
		$this->db->where('id',$edid);
	  	$res = $this->db->get('tbl_cons_doct')->result();
	  	return $res;
	}

	public function insert_consultants(){
    	$data = array();
      	$s_data = array(
	        "name" => $this->input->post('name'),
	        "status" => $this->input->post('status'),
	        "qualification" => $this->input->post('qualification'),
	        "address" => $this->input->post('address'),
	        "mobileno" => $this->input->post('mobileno'),
	        "category" => $this->input->post('category'),
	        "second" => $this->input->post('second'),
	        "first" => $this->input->post('first'),
	        "department" => $this->input->post('department'),
	        "m_state_added_on" => date('Y-m-d H:i'),
	      );
      $set = $this->db->insert('tbl_cons_doct',$s_data);
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

    public function update_consultant(){
    $data = array();
      $s_data = array(
        "name" => $this->input->post('name'),
        "status" => $this->input->post('status'),
        "qualification" => $this->input->post('qualification'),
        "address" => $this->input->post('address'),
        "mobileno" => $this->input->post('mobileno'),
        "category" => $this->input->post('category'),
        "second" => $this->input->post('second'),
        "first" => $this->input->post('first'),
        "department" => $this->input->post('department'),
      );
      $this->db->where('id',$this->input->post('edit_id'));
      $set = $this->db->update('tbl_cons_doct',$s_data);
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

    public function delete_consultant(){
      $this->db->where('id', $this->input->post('delete_id'));
      $set = $this->db->delete('tbl_cons_doct');
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


