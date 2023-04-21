<?php date_default_timezone_set('Asia/Kolkata');

class Main_model extends CI_model{
  public function get_all_city_list()
  {
    $res = $this->db->get('master_city_tbl')->result();
    return $res;
  }  
}
