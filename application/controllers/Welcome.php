<?php defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class Welcome extends CI_Controller {

//=========================Welcome============================//



//=========================Welcome============================//

public function index(){ $data = $this->login_details();

  $data['pagename'] = "Dashboard"; 

 

  $data['from_date'] ='';
  $data['to_date'] ='';
  $data['plan'] ='';
  $data['exp'] ='';

  $data['from_date'] = $this->input->get('from_date');
  $data['to_date'] = $this->input->get('to_date');
  //$data['dashboard_statics'] = $this->Main_model->dashboard_statics($data['globel_branch']);
  $this->load->view('dashboard', $data);

}

public function Change_globel_branch()
{
  $data = $this->login_details();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($data = $this->Main_model->Change_globel_branch()) {
      $info = array(
        'status' => 'success',
        'message' => 'Branch Change Successfully'
      );
    } else {
      $info = array(
        'status' => 'fail',
        'message' => 'Some Problem Occured Please Try Again'
      );
    }
    echo json_encode($info);
  }
}

//=========================/Welcome===========================//



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



protected function ajax_login(){

  $is_user_in = $this->session->userdata('is_user_in');

  if(isset($is_user_in) || $is_user_in == true){ return true;

  } else { echo json_encode(array( 'status'=>'error', 'message'=>'You are not Logged in Now!! Please login again.')); return false; 

  }

}

//=====================/Login Validation======================//



//=========================/Welcome===========================//

} ?>