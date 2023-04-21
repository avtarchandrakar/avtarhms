<?php date_default_timezone_set('Asia/Kolkata');
class Billing_item extends CI_model{
  	//State
	public function get_all_billing_item(){
		$this->db->select('billing_item.*,tbl_item_group.name as group_name,tbl_cons_doct.name as consultant');
    $this->db->join('tbl_item_group', 'tbl_item_group.id = billing_item.group_id','left');
    $this->db->join('tbl_cons_doct', 'tbl_cons_doct.id = billing_item.consultant_id','left');
    $this->db->order_by('tbl_item_group.name');
    $res = $this->db->get('billing_item')->result();
  	// $res = $this->db->get('tbl_item_group')->result();
  	return $res;
	}

  public function get_a_billing_item($edid){
    $this->db->select('*');
    $this->db->where('id',$edid);
      $this->db->order_by('name');
      $res = $this->db->get('billing_item')->result();
      return $res;
  }


	public function insert_billing_items(){
    	$data = array();
      	$s_data = array(
	        "name" => $this->input->post('names'),
          "type" => 'Test',
          "service_code" => $this->input->post('service_code'),
          "group_id" => $this->input->post('group_id'),
          "credit_to" => $this->input->post('credit_to'),
          "perc" => $this->input->post('perc'),
          "department_id" => $this->input->post('department'),
	        "status" => $this->input->post('status'),
	        "m_state_added_on" => date('Y-m-d H:i'),
	      );
      $set = $this->db->insert('billing_item',$s_data);
      if(!empty($set)){
        $data['status'] = 'success';
        $data['message'] = 'Inserted Successfully!';
      }
      else{
        $data['status'] = 'fail';
        $data['message'] = 'Somthing went wrong!';
      }
      return json_encode($data);
      // print_r($s_data);
    }

    public function update_billing_item(){
    $data = array();
      $s_data = array(
          "name" => $this->input->post('names'),
          "type" => 'Test',
          "service_code" => $this->input->post('service_code'),
          "group_id" => $this->input->post('group_id'),
          "credit_to" => $this->input->post('credit_to'),
          "perc" => $this->input->post('perc'),
          "department_id" => $this->input->post('department'),
          "status" => $this->input->post('status'),
          "m_state_added_on" => date('Y-m-d H:i'),
      );
      $this->db->where('id',$this->input->post('edit_id'));
      $set = $this->db->update('billing_item',$s_data);
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

    public function delete_billing_item(){
      $this->db->where('id', $this->input->post('delete_id'));
      $set = $this->db->delete('billing_item');
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


