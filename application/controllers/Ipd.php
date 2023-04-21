<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Ipd extends CI_Controller{
    public function admission(){ 
        $data = $this->login_details();
        $data['pagename'] = "Patient Admission";
        $data['from_date'] ='';
        $data['to_date'] ='';
        $data['from_date'] = $this->input->get('from_date');
        $data['to_date'] = $this->input->get('to_date');
        $data['city_dtl'] = $this->Main_model->get_all_city_list();
        $data['mech_value'] = $this->Student_model->get_student_list($data['from_date'],$data['to_date']);
        $this->load->view('ipd/admission', $data);
      
      }


    public function patients(){ 
        $data = $this->login_details();
        $data['pagename'] = "Admit Patient";
        $data['from_date'] ='';
        $data['to_date'] ='';
        $data['from_date'] = $this->input->get('from_date');
        $data['to_date'] = $this->input->get('to_date');
        $data['city_dtl'] = $this->Main_model->get_all_city_list();
        $data['mech_value'] = $this->Student_model->get_student_list($data['from_date'],$data['to_date']);
        $this->load->view('student_list', $data);
      
      }


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
  
  }

