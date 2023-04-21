<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class API_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Load model
    $this->load->model('API_model');
  }

  public function index()
  {
    echo "Not Found";
  }
  public function check_user()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $mobile   = $this->input->post('user_mobile');
      if ($user = $this->API_model->check_user($mobile)) {
        $info = array(
          'response' => 'success',
          'message' => 'User exist',
          'user' => $this->API_model->user_details($user[0]->m_student_id),
        );
      } else {

        $info = array(
          'response' => 'error',
          'message' => 'Does not exists',
          'user' => array()
        );
      }
      echo json_encode($info);
    }
  }
  public function user_details()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $student_id = $this->input->post('student_id');
      if ($details = $this->API_model->user_details($student_id)) {
        $info = array(
          'response' => 'success',
          'message' => 'User Details',
          'details' => $details
        );
      } else {
        $info = array(
          'response' => 'fail',
          'message' => 'No data found',
          'details' => array()
        );
      }
      echo json_encode($info);
    }
  }
  public function user_signup()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $mobile = $this->input->post('user_mobile');
      if ($this->API_model->check_mobile($mobile)) {
        $info = array(
          'response' => 'error',
          'message' => 'Mobile number already Exists',
          'user' => array()
        );
      } else {
        if ($user = $this->API_model->user_signup()) {
          $userdata = $this->API_model->user_details($user);
          $info = array(
            'response' => 'success',
            'message' => 'Signup successfully',
            'user' => $userdata,
          );
          $message = "Welcome to The Study Cafe <br> Your registration has been successfull";
          $subject = "Welcome to The Study Cafe";
          // print_r($userdata[0]->m_student_fcm);
          $this->API_model->email1($userdata[0]->m_student_id, $userdata[0]->m_student_name, $message, $subject, $userdata[0]->m_student_email);
          $this->API_model->send_push($subject,$message,$userdata[0]->m_student_fcm);
        } else {

          $info = array(
            'response' => 'error',
            'message' => 'Some Problem Occured',
            'user' => array()
          );
        }
      }
      echo json_encode($info);
    }
  }
  public function user_login()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $mobile   = $this->input->post('user_mobile');
      $password = $this->input->post('user_password');
      if ($user = $this->API_model->user_login($mobile, $password)) {
        $info = array(
          'response' => 'success',
          'message' => 'Login successfully',
          'user' => $this->API_model->user_details($user[0]->m_student_id),
        );
      } else {

        $info = array(
          'response' => 'error',
          'message' => 'Some Problem Occured',
          'user' => array()
        );
      }
      echo json_encode($info);
    }
  }
  public function send_user_otp()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $user_mobile = $this->input->post('user_mobile');

      if ($data = $this->API_model->send_user_otp($user_mobile)) {
        $info = array(
          'response' => 'success',
          'message' => 'OTP sent successfully'
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'Some Problem Occured'
        );
      }
      echo json_encode($info);
    }
  }
  public function verify_user_otp()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $user_mobile = $this->input->post('user_mobile');
      $otp = $this->input->post('otp');

      if ($data = $this->API_model->verify_user_otp($user_mobile, $otp)) {
        $info = array(
          'response' => 'success',
          'user' => $data
        );
      } else {
        $info = array(
          'response' => 'error',
          'user' => array()
        );
      }
      echo json_encode($info);
    }
  }
  public function update_password()
  {
    $user_id = $this->input->post('user_id');
    $user_password = $this->input->post('user_password');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($user = $this->API_model->update_password($user_id, $user_password)) {
        $info = array(
          'response' => 'success',
          'message' => 'Passowrd updated successfully',
          'user' => $this->API_model->user_details($user_id),
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'No data found',
        );
      }
      echo json_encode($info);
    }
  }
  public function update_fcm()
  {
    $user_id = $this->input->post('user_id');
    $user_fcm = $this->input->post('user_fcm');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($user = $this->API_model->update_fcm($user_id, $user_fcm)) {
        $info = array(
          'response' => 'success',
          'message' => 'FCM updated successfully',
          'user' => $this->API_model->user_details($user_id),
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'No data found',
        );
      }
      echo json_encode($info);
    }
  }
  public function update_profile()
  {
    $user_id = $this->input->post('user_id');
    $user_password = $this->input->post('user_password');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($user = $this->API_model->update_profile()) {
        $info = array(
          'response' => 'success',
          'message' => 'Profile updated successfully',
          'user' => $this->API_model->user_details($user_id),
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'No data found',
        );
      }
      echo json_encode($info);
    }
  }
  public function get_notification()
  {
    $user_id = $this->input->post('user_id');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($data = $this->API_model->get_notification($user_id)) {
        $info = array(
          'response' => 'success',
          'notification' => $data,
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'No data found',
        );
      }
      echo json_encode($info);
    }
  }
  public function get_city()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($data = $this->API_model->get_city()) {
        $info = array(
          'response' => 'success',
          'city' => $data,
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'No data found',
        );
      }
      echo json_encode($info);
    }
  }
  public function get_slider()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($data = $this->API_model->get_slider()) {
        $info = array(
          'response' => 'success',
          'slider' => $data,
        );
      } else {
        $info = array(
          'response' => 'error',
          'message' => 'No data found',
        );
      }
      echo json_encode($info);
    }
  }
public function sendTestFCM(){
 // $this->API_model->sendNotification();
 $this->API_model->send_push_notification(array('dB2orx6RSxyx_Ja4hKb0c5:APA91bEBMWTiDA3viviKSHiaJZq-oB41-FaVDlPIBDD0hUW_icvFmXDSg2khI7ErWtuhHVNPgYGhUYYIiQrrJj5t3dXtVk6LyehHV7ny5zqCfk-vyFqpm3nPjakPwQCMBM6s1E7c-Ixj','senderid string 2'),'What is Push Notification ?','In general, push notifications are the message / notifications you will receive in android. This makes the customers engage with the clients on digital platforms. This service can be initiated in either way form users or from clients. ','https://stackoverlode.com/no-image/image.jpg');
}

public function sendPush(){
  $title ="test";
  $message = "test";
  $fctoken = "dB2orx6RSxyx_Ja4hKb0c5:APA91bEBMWTiDA3viviKSHiaJZq-oB41-FaVDlPIBDD0hUW_icvFmXDSg2khI7ErWtuhHVNPgYGhUYYIiQrrJj5t3dXtVk6LyehHV7ny5zqCfk-vyFqpm3nPjakPwQCMBM6s1E7c-Ixj";
 $push = $this->API_model->send_push($title,$message,$fctoken,$order='',$type='',$include_image='');
 print_r($push);
}


public function sendToMultiple(){
  $this->API_model->sendToMultiple();
}


}
