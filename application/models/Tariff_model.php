<?php date_default_timezone_set('Asia/Kolkata');
class Tariff_model extends CI_model{
 
  public function get_all_tariff(){
    $this->db->select('*');
    $this->db->where('mtype', 'tariff');
    $this->db->where('company_id', '1');
    $this->db->order_by('name');
    $res = $this->db->get('m_master')->result();
    return $res;
  }

  public function get_a_tariff($edid){
    $this->db->select('*');
    $this->db->where('id',$edid);
    $res = $this->db->get('m_master')->result();
    return $res;
  }


	public function insert_tariff(){
    	$data = array();
      	$s_data = array(
	        "name" => $this->input->post('name'),
	        "status_data" => $this->input->post('status_data'),
          "mtype" => 'tariff',
	      );
      $set = $this->db->insert('m_master',$s_data);
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

    public function update_tariff(){
    $data = array();
      $s_data = array(
          "name" => $this->input->post('name'),
          "status_data" => $this->input->post('status_data'),
          "mtype" => 'tariff',
      );
      $this->db->where('id',$this->input->post('edit_id'));
      $set = $this->db->update('m_master',$s_data);
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

    public function delete_tariff(){
      $this->db->where('id', $this->input->post('delete_id'));
      $set = $this->db->delete('m_master');
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


