<?php date_default_timezone_set('Asia/Kolkata');
class Billing_group extends CI_model{
  	//State
	public function get_all_billing_group(){
		$this->db->select('*');
      $this->db->order_by('name');
	  	$res = $this->db->get('tbl_item_group')->result();
	  	return $res;
	}

  public function get_a_billing_group($edid){
    $this->db->select('*');
    $this->db->where('id',$edid);
      $this->db->order_by('name');
      $res = $this->db->get('tbl_item_group')->result();
      return $res;
  }


	public function insert_billing_groups(){
    	$data = array();
      	$s_data = array(
	        "name" => $this->input->post('name'),
	        "status" => $this->input->post('status'),
          "ipd_bill" => $this->input->post('ipd_bill'),
          "sort" => $this->input->post('sort'),
	        "m_state_added_on" => date('Y-m-d H:i'),
	      );
      $set = $this->db->insert('tbl_item_group',$s_data);
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

    public function update_billing_group(){
    $data = array();
      $s_data = array(
          "name" => $this->input->post('name'),
          "status" => $this->input->post('status'),
          "ipd_bill" => $this->input->post('ipd_bill'),
          "sort" => $this->input->post('sort'),
          "m_state_added_on" => date('Y-m-d H:i'),
      );
      $this->db->where('id',$this->input->post('edit_id'));
      $set = $this->db->update('tbl_item_group',$s_data);
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

    public function delete_billing_group(){
      $this->db->where('id', $this->input->post('delete_id'));
      $set = $this->db->delete('tbl_item_group');
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


