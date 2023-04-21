<?php date_default_timezone_set('Asia/Kolkata');
class Slider_model extends CI_model {
//============================User============================//

//===========================Profile==========================//

 public function get_slider(){
    $this->db->select('*');
    $this->db->order_by('m_slider_id' ,'ASC');
    $data =$this->db->get('master_slider_tbl');
    return $data->result();   
}

public function insert_slider(){

  if(!empty($_FILES['m_slider_img']['name'])){
      $config['file_name'] = $_FILES['m_slider_img']['name'];
      $config['upload_path'] = 'uploads/slider';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['remove_spaces'] = TRUE;
      $config['file_name'] = $_FILES['m_slider_img']['name'];
      //Load upload library and initialize configuration
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('m_slider_img')){
        $uploadData = $this->upload->data();  
        if (!empty($update_data['m_slider_img'])) { 
          if(file_exists($config['m_slider_img'].$update_data['m_slider_img'])){
          unlink($config['upload_path'].$update_data['m_slider_img']); /* deleting Image */
          } 
        }
        $m_slider_img = $uploadData['file_name'];
      }
    }
    else{
      $m_slider_img ='';
    }

  $insert_data = array(
    "m_slider_title"    => $this->input->post('m_slider_title'),
    "m_slider_img"   => $m_slider_img,
    "m_slider_desc"=> $this->input->post('m_slider_desc'),
    "m_slider_status"    => $this->input->post('m_slider_status'),
    "m_slider_added_on" => date('Y-m-d H:i:s'),
   
  );

  return $this->db->insert('master_slider_tbl',$insert_data);
}



 public function get_edit_slider($id){
    $this->db->select('*');
    $this->db->where('m_slider_id' ,$id);
    $data =$this->db->get('master_slider_tbl');
    return $data->result();   
}


public function update_slider(){
    if(!empty($_FILES['m_slider_img']['name'])){
      $config['file_name'] = $_FILES['m_slider_img']['name'];
      $config['upload_path'] = 'uploads/slider';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['remove_spaces'] = TRUE;
      $config['file_name'] = $_FILES['m_slider_img']['name'];
      //Load upload library and initialize configuration
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('m_slider_img')){
        $uploadData = $this->upload->data();  
        if (!empty($update_data['m_slider_img'])) { 
          if(file_exists($config['m_slider_img'].$update_data['m_slider_img'])){
          unlink($config['upload_path'].$update_data['m_slider_img']); /* deleting Image */
          } 
        }
        $m_slider_img = $uploadData['file_name'];
      }
    }
    else{
      $m_slider_img =$this->input->post('m_slider_img1');
    }

      $data = array(
     "m_slider_title"    => $this->input->post('m_slider_title'),
     "m_slider_img"   => $m_slider_img,
     "m_slider_desc"=> $this->input->post('m_slider_desc'),
     "m_slider_status"    => $this->input->post('m_slider_status'),
      
    );    
    $this->db->where('m_slider_id', $this->input->post('m_slider_id'));
    $this->db->update('master_slider_tbl', $data);
    return true;
  } 


public function delete_slider(){
    $this->db->where('m_slider_id', $this->input->post('delete_id'));
    $this->db->delete('master_slider_tbl');
    return true;
  }


//==========================/Profile==========================//


//==========================/Graph============================//

//===========================/User============================//
} ?>