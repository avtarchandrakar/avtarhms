<?php date_default_timezone_set('Asia/Kolkata');
class Company_model extends CI_model{
 
  public function get_all_company(){
    $this->db->select('m_master.*,mm.name as parent_name');
    $this->db->join('m_master mm', 'mm.id = m_master.parent', 'inner');
    $this->db->where('m_master.mtype', 'company');
    $this->db->where('m_master.company_id', '1');
    $this->db->order_by('m_master.name');
    $res = $this->db->get('m_master')->result();
    return $res;
  }

  public function get_a_companys($edid){
    $this->db->select('*');
    $this->db->where('id',$edid);
    $res = $this->db->get('m_master')->result();
    return $res;
  }

  public function get_company(){
    $this->db->select('*');
    $this->db->where('mtype', 'tariff');
    $this->db->where('company_id', '1');
    $this->db->order_by('name');
    $res = $this->db->get('m_master')->result();
    return $res;
  }

	public function insert_company(){
    	$data = array();
      	$s_data = array(
	        "name" => $this->input->post('name'),
          "parent" => $this->input->post('tariff'),
          "mtype" => 'company',
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

    public function update_company(){
    $data = array();
      $s_data = array(
          "name" => $this->input->post('name'),
          "status_data" => $this->input->post('status_data'),
          "parent" => $this->input->post('tariff'),
          "mtype" => 'company',
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

    public function delete_company(){
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


