<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Profile extends CI_Controller {
//=========================Profile============================//

//=========================Profile==================admin=====//
public function index(){ $data = $this->login_details();
  $data['pagename'] = "Profile Your";

  $data['user_dtl'] = $this->Login_model->get_user_profile_details();

  $this->load->view('profile_admin', $data);
}

public function update_profile(){ if ($this->ajax_login() === false) { return; }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_POST["kh_userid"] = $this->session->userdata('user_id');
    if($data = $this->Student_model->update_profile()){
      $info = array( 'status'=>'success',
        'message'=>'Admin Profile has been Updated successfully!'
      );
    }else{ $info = array( 'status'=>'fail',
        'message'=>'Some problem Occurred!! please try again'
      );
    } echo json_encode($info);
  }
}
//========================/Profile==================admin=====//

//=========================Profile==================app=======//
public function app(){ $data = $this->login_details();
  $data['pagename'] = "Profile Application";
  $this->load->view('profile_application', $data);
} 

public function update_app(){ if ($this->ajax_login() === false) { return; }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($data = $this->Student_model->update_app()){
      $info = array( 'status'=>'success',
        'message'=>'Application Details has been Updated successfully!'
      );
    }else{ $info = array( 'status'=>'fail',
        'message'=>'Some problem Occurred!! please try again'
      );
    } echo json_encode($info);
  }
}
public function application_settings(){ $data = $this->login_details();
  $data['pagename'] = "Application Setting";
  $data['app_details'] = $this->Student_model->get_application_settings();
  $this->load->view('application_settings',$data);
} 
public function update_settings(){
 if ($this->ajax_login() === false) { return; }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($data = $this->Student_model->update_settings()){
      $info = array( 'status'=>'success',
        'message'=>'Application Settings has been update successfully!'
      );
    }else{ $info = array( 'status'=>'error',
        'message'=>'Some problem Occurred!! please try again'
      );
    } echo json_encode($info);
  }
}
//========================/Profile==================app=======//

//==========================Details===========================//
protected function login_details(){ $this->require_login();
  $data['log_user_dtl'] = $this->Login_model->user_details();
  return $data;
}
//=========================/Details===========================//
  
//======================Login Validation======================//
protected function require_login(){
  $is_user_in = $this->session->userdata('is_user_in');
  if(isset($is_user_in) || $is_user_in == true){ return;
  } else { redirect('Login'); }
}

protected function ajax_login($nav_id=''){
  $is_user_in = $this->session->userdata('is_user_in');
  if(isset($is_user_in) || $is_user_in == true){ return true;
  } else { echo json_encode(array( 'status'=>'error', 'message'=>'You are not Logged in Now!! Please login again.')); return false; 
  }
}
//=====================/Login Validation======================//

//========================/Profile============================//
} ?>