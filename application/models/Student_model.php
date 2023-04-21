<?php date_default_timezone_set('Asia/Kolkata');
class Student_model extends CI_model {
//============================User============================//

//===========================Profile==========================//
public function update_profile(){
  $update_data = array(
    "m_admin_name"    => $this->input->post('m_admin_name'),
    "m_admin_email"   => $this->input->post('m_admin_email'),
    "m_admin_login_id"=> $this->input->post('m_admin_login_id'),
    "m_admin_pass"    => $this->input->post('m_admin_pass'),
    "m_admin_contact" => $this->input->post('m_admin_contact'),
    "m_admin_img"     => $this->input->post('pre_m_admin_img'),
  );

  if(!empty($_FILES['m_admin_img']['name'])){  
    $config['upload_path'] = 'uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['remove_spaces'] = TRUE;
    $config['file_name'] = $_FILES['m_admin_img']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('m_admin_img')){
      $uploadData = $this->upload->data();
      
      if (!empty($update_data['m_admin_img'])) { 
        if(file_exists($config['upload_path'].$update_data['m_admin_img'])){
        unlink($config['upload_path'].$update_data['m_admin_img']); /* deleting Image */
      } }

      $update_data['m_admin_img'] = $uploadData['file_name'];

    }
  }

  $this->db->where('m_admin_id', $this->session->userdata('user_id'));
  return $this->db->update('master_admin_tbl',$update_data);
}
public function get_application_settings(){
  $res =$this->db->get('application_settings')->result();
  return $res;
}
public function update_settings(){
    if(!empty($_FILES['m_app_logo']['name'])){
      $config['file_name'] = $_FILES['m_app_logo']['name'];
      $config['upload_path'] = 'uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['remove_spaces'] = TRUE;
      $config['file_name'] = $_FILES['m_app_logo']['name'];
      //Load upload library and initialize configuration
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('m_app_logo')){
        $uploadData = $this->upload->data();  
        if (!empty($update_data['m_app_logo'])) { 
          if(file_exists($config['m_app_logo'].$update_data['m_app_logo'])){
          unlink($config['upload_path'].$update_data['m_app_logo']); /* deleting Image */
          } 
        }
        $m_app_logo = $uploadData['file_name'];
      }
    }
    else{
      $m_app_logo =$this->input->post('applogo');
    }
    if(!empty($_FILES['m_app_icon']['name'])){
      $config['file_name'] = $_FILES['m_app_icon']['name'];
      $config['upload_path'] = 'uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['remove_spaces'] = TRUE;
      $config['file_name'] = $_FILES['m_app_icon']['name'];
      //Load upload library and initialize configuration
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('m_app_icon')){
        $uploadData = $this->upload->data();  
        if (!empty($update_data['m_app_icon'])) { 
          if(file_exists($config['m_app_icon'].$update_data['m_app_icon'])){
          unlink($config['upload_path'].$update_data['m_app_icon']); /* deleting Image */
          } 
        }
        $m_app_icon = $uploadData['file_name'];
      }
    }
    else{
      $m_app_icon =$this->input->post('appfavicon');
    }
    if(!empty($_FILES['m_app_banner']['name'])){
      $config['file_name'] = $_FILES['m_app_banner']['name'];
      $config['upload_path'] = 'uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['remove_spaces'] = TRUE;
      $config['file_name'] = $_FILES['m_app_banner']['name'];
      //Load upload library and initialize configuration
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('m_app_banner')){
        $uploadData = $this->upload->data();  
        if (!empty($update_data['m_app_banner'])) { 
          if(file_exists($config['m_app_banner'].$update_data['m_app_banner'])){
          unlink($config['upload_path'].$update_data['m_app_banner']); /* deleting Image */
          } 
        }
        $m_app_banner = $uploadData['file_name'];
      }
    }
    else{
      $m_app_banner =$this->input->post('appbanner');
    }
    $data = array(
      "m_app_name" => $this->input->post('m_app_name'),
      "m_app_title" => $this->input->post('m_app_title'),
      "m_app_email" => $this->input->post('m_app_mail'),
      "m_app_mobile" => $this->input->post('m_app_contact'),
      "m_app_address" => $this->input->post('m_app_address'),
      "m_app_logo" => "$m_app_logo",
      "m_app_icon" => "$m_app_icon",
      "m_app_banner" => "$m_app_banner",
    );
    $this->db->where('m_app_id',1);
    $this->db->update('application_settings', $data);
    return true;
  }
public function update_app(){
  if (!empty($_FILES)) {
    $config['upload_path'] = '../uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['remove_spaces'] = TRUE;
  }
  if(!empty($_FILES['app_favicon']['name'])){  
    $_POST['app_favicon'] = $_POST['app_pfavicon']; unset($_POST['app_pfavicon']);

    $config['file_name'] = $_FILES['app_favicon']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('app_favicon')){
      $uploadData = $this->upload->data();
      
      if (!empty($_POST['app_favicon'])) { 
        if(file_exists($config['upload_path'].$_POST['app_favicon'])){
        unlink($config['upload_path'].$_POST['app_favicon']); /* Deleting Image */
      } }

      $_POST['app_favicon'] = $uploadData['file_name'];

    }
  }

  if(!empty($_FILES['app_logo']['name'])){  
    $_POST['app_logo'] = $_POST['app_plogo']; unset($_POST['app_plogo']);

    $config['file_name'] = $_FILES['app_logo']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('app_logo')){
      $uploadData = $this->upload->data();
      
      if (!empty($_POST['app_logo'])) { 
        if(file_exists($config['upload_path'].$_POST['app_logo'])){
        unlink($config['upload_path'].$_POST['app_logo']); /* Deleting Image */
      } }
      
      $_POST['app_logo'] = $uploadData['file_name'];

    }
  }

  if(!empty($_FILES['app_footer_logo']['name'])){  
    $_POST['app_footer_logo'] = $_POST['app_footer_plogo']; 
    unset($_POST['app_footer_plogo']);

    $config['file_name'] = $_FILES['app_footer_logo']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('app_footer_logo')){
      $uploadData = $this->upload->data();
      
      if (!empty($_POST['app_footer_logo'])) { 
        if(file_exists($config['upload_path'].$_POST['app_footer_logo'])){
        unlink($config['upload_path'].$_POST['app_footer_logo']); /* Deleting Image */
      } }
      
      $_POST['app_footer_logo'] = $uploadData['file_name'];

    }
  }

  if(!empty($_FILES['app_mobile_logo']['name'])){  
    $_POST['app_mobile_logo'] = $_POST['app_mobile_plogo']; 
    unset($_POST['app_mobile_plogo']);

    $config['file_name'] = $_FILES['app_mobile_logo']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('app_mobile_logo')){
      $uploadData = $this->upload->data();
      
      if (!empty($_POST['app_mobile_logo'])) { 
        if(file_exists($config['upload_path'].$_POST['app_mobile_logo'])){
        unlink($config['upload_path'].$_POST['app_mobile_logo']); /* Deleting Image */
      } }
      
      $_POST['app_mobile_logo'] = $uploadData['file_name'];

    }
  }

  foreach ($_POST as $key => $value) {
    $this->db->set('m_app_value', $value);
    $this->db->where('m_app_key', $key);;
    $this->db->update('master_app_settings');
  }
  return true;
}
//==========================/Profile==========================//

//==========================Counter===========================//
public function get_counter_data(){
  $this->db->from('master_users_tbl');
  $res['users'] = $this->db->count_all_results();

  $this->db->from('master_category_tbl');
  $res['categories'] = $this->db->count_all_results();

  $this->db->from('master_listings_tbl');
  $res['all_listings'] = $this->db->count_all_results();

  $this->db->from('master_listings_tbl');
  $this->db->where('m_listing_status', 1);
  $res['active_listings'] = $this->db->count_all_results();

  $this->db->from('master_listings_tbl');
  $this->db->where('m_listing_status', 0);
  $res['pending_listings'] = $this->db->count_all_results();

  $this->db->from('master_advertisement_tbl');
  $this->db->where('m_ad_start_on <=', date("Y-m-d H:i:s"));
  $this->db->where('m_ad_end_on >=', date("Y-m-d H:i:s"));
  $this->db->where('m_ad_status', 1);
  $res['running_ads'] = $this->db->count_all_results();

  $this->db->from('master_advertisement_tbl');
  $res['all_ads'] = $this->db->count_all_results();

  return (object) $res;
}
//=========================/Counter===========================//

//===========================Graph============================//
public function get_monthly_listings($fdate='', $tdate=''){
  if (empty($fdate) || empty($tdate)){
    $fdate = date("Y-01"); $tdate = date("Y-12");
  }
  
  $result = array(); $mdate=$fdate;
  while ($mdate <= $tdate) {

    $mfdate = date("Y-m-01",strtotime($mdate));
    $mtdate = date("Y-m-t",strtotime($mdate));

    $result[] = (object) [
      'date' => $mdate, 
      'listings' => $this->get_date_listings($mfdate, $mtdate)
    ]; 

    $mdate = strtotime('+1 MONTH', strtotime($mdate));
    $mdate = date("Y-m", $mdate);
  }

  return array('fdate' => $fdate, 'tdate' => $tdate, 'monts_lsts' => $result );

}

public function get_date_listings($f_date='', $t_date=''){ $res = 0;
  if (!empty($f_date) && !empty($t_date)) {
    $this->db->where('DATE(m_listing_added_on) >=',$f_date);
    $this->db->where('DATE(m_listing_added_on) <=',$t_date);
    $this->db->from('master_listings_tbl');
    $res = $this->db->count_all_results();
  }

  return $res;
}
//==========================/Graph============================//

public function get_vendor_dtl_list(){
  $this->db->select('*');
  $this->db->join('master_city_tbl','master_city_tbl.m_city_id = master_vendors_tbl.m_vendor_city','left');
  $res = $this->db->get('master_vendors_tbl')->result();
  return $res;
}

public function insert_vendors_dtl(){

  $vendorid = $this->input->post('m_Vendor_id');

  // for 1st image upload code.
    if(!empty($_FILES['m_Vendor_image']['name'])){
    $config['file_name'] = $_FILES['m_Vendor_image']['name'];
    $config['upload_path'] = 'uploads/Category';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $config['remove_spaces'] = TRUE;
    $config['file_name'] = $_FILES['m_Vendor_image']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('m_Vendor_image')){
      $uploadData = $this->upload->data();  
      if (!empty($update_data['m_Vendor_image'])) { 
        if(file_exists($config['m_Vendor_image'].$update_data['m_Vendor_image'])){
        unlink($config['upload_path'].$update_data['m_Vendor_image']); /* deleting Image */
        } 
      }
      $m_Vendor_image = $uploadData['file_name'];
    }
  }
  else{
    $m_Vendor_image = $this->input->post('m_Vendor_image1');
  }
$data = array(
    "m_vendor_name" => $this->input->post('m_Vendor_name'),
    "m_vendor_mobile" => $this->input->post('m_Vendor_mobile'),
    "m_vendor_pic" => $m_Vendor_image,
    "m_vendor_city" => $this->input->post('m_Vendor_city'),
    "m_vendor_area" => $this->input->post('m_Vendor_area'),
    "m_vendor_email" => $this->input->post('m_Vendor_email'),
    "m_vendor_address" => $this->input->post('m_Vendor_address'),
    "m_vendor_gender" => $this->input->post('m_Vendor_gender'),
    "m_vendor_dob" => $this->input->post('m_Vendor_dob'),
    "m_vendor_added_on"=>date('Y-m-d H:i:s'),
    "m_vendor_status" => $this->input->post('m_Vendor_status'),
     
  );
if(!empty($vendorid)){
$this->db->where('m_vendor_id',$vendorid)->update('master_vendors_tbl', $data);
}else{
$this->db->insert('master_vendors_tbl', $data);
}
 
  return true;
}

public function get_vendor_dtl($id){
  $this->db->select('*');
  $this->db->join('master_city_tbl','master_city_tbl.m_city_id = master_vendors_tbl.m_vendor_city','left');


  $this->db->where('m_vendor_id', $id);
  $res = $this->db->get('master_vendors_tbl')->result();
//  echo "<pre>";print_r($res);die();
  return $res;
}

public function delete_vendor_dtl(){
  $this->db->where('m_vendor_id', $this->input->post('delete_id'));
  $this->db->delete('master_vendors_tbl');
  return array( 'status'=>'success',
    'message'=>'Data has been Deleted Successfully!'
  );
}
public function get_student_list($from_date,$to_date,$branch=''){
  if(!empty($branch)){
    $this->db->where('m_student_curr_branch',$branch);
  }
  if(!empty($from_date) && !empty($to_date)){
    $this->db->where('DATE_FORMAT(m_student_added_on,"%Y-%m-%d")>=',$from_date);
    $this->db->where('DATE_FORMAT(m_student_added_on,"%Y-%m-%d")<=',$to_date);
  }
  $res = $this->db->get('master_students_tbl')->result();
  return $res;
}

public function insert_student_dtl(){

  $studentid = $this->input->post('m_student_id');

  // for 1st image upload code.
    if(!empty($_FILES['m_student_image']['name'])){
    $config['file_name'] = $_FILES['m_student_image']['name'];
    $config['upload_path'] = 'uploads/Student';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['remove_spaces'] = TRUE;
    $config['file_name'] = $_FILES['m_student_image']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('m_student_image')){
      $uploadData = $this->upload->data();  
      if (!empty($update_data['m_student_image'])) { 
        if(file_exists($config['m_student_image'].$update_data['m_student_image'])){
        unlink($config['upload_path'].$update_data['m_student_image']); /* deleting Image */
        } 
      }
      $m_student_image = $uploadData['file_name'];
    }
  }
  else{
    $m_student_image = $this->input->post('m_student_image1');
  }
$data = array(
    "m_student_name" => $this->input->post('m_student_name'),
    "m_student_mobile" => $this->input->post('m_student_mobile'),
    "m_student_image" => $m_student_image,
    "m_student_city" => $this->input->post('m_student_city'),
    // "m_student_area" => $this->input->post('m_student_area'),
    "m_student_email" => $this->input->post('m_student_email'),
    "m_student_address" => $this->input->post('m_student_address'),
    "m_student_gender" => $this->input->post('m_student_gender'),
    // "m_student_dob" => $this->input->post('m_student_dob'),
    "m_student_added_on"=>date('Y-m-d H:i:s'),
    "m_student_status" => $this->input->post('m_student_status'),
     
  );
if(!empty($studentid)){
$this->db->where('m_student_id',$studentid)->update('master_students_tbl', $data);
}else{
$this->db->insert('master_students_tbl', $data);
}
 
  return true;
}

public function get_student_dtl($id){
  $this->db->select('*');
  $this->db->where('m_student_id', $id);
  $this->db->join('master_state_tbl','master_state_tbl.m_state_id = master_students_tbl.m_student_state','left');
  $this->db->join('master_city_tbl','master_city_tbl.m_city_id = master_students_tbl.m_student_city','left');
  $res = $this->db->get('master_students_tbl')->result();
//  echo "<pre>";print_r($res);die();
  return $res;
}

public function delete_student_dtl(){
  $this->db->where('m_student_id', $this->input->post('delete_id'));
  $this->db->delete('master_students_tbl');
  return array( 'status'=>'success',
    'message'=>'Data has been Deleted Successfully!'
  );
}

public function update_verification()
{
  $data = array(
    "m_student_aadhar_verified" => $this->input->post('value'),
  );

$this->db->where('m_student_id',$this->input->post('student_id'))->update('master_students_tbl', $data);
 return true ;
}











//===========================/User============================//
} ?>