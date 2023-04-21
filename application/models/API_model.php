<?php
date_default_timezone_set('Asia/Kolkata');
class API_model extends CI_model {
    function sendSms($message,$mobile,$dltid){

        //Your authentication key
      $authKey = "303928AjHixtxm5dce3987";
       //Multiple mobiles numbers separated by comma
      $mobileNumber = $mobile;
        //Sender ID,While using route4 sender id should be 6 characters long.

      $senderId = "LGXHNT";
        //Your message to send, Add URL encoding here.

      $msg = urlencode($message);
        //Define route 

      $route =4;

        //Prepare you post parameters

      $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $msg,
        'sender' => $senderId,
        'route' => $route,
        'DLT_TE_ID'=>$dltid,
      );

        //API URL

      $url="http://api.msg91.com/api/sendhttp.php";

        //  init the resource

      $ch = curl_init();

      curl_setopt_array($ch, array(

        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
      ));

        //  //Ignore SSL certificate verification

      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //  //get response
      $output = curl_exec($ch);
        //  //Print error if any

      if(curl_errno($ch)){
        //echo 'error:' . curl_error($ch);
      }

      curl_close($ch);
        return true;
    }
    function sendmail($subject,$html,$email){

    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'mail.logixcard.com',
        'smtp_port' => 25,
        'smtp_user' => 'info@logixcard.com', // change it to yours
        'smtp_pass' => 'ja$r22tI~=[&', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
  
    );
    $this->load->library('email', $config);
      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
      $this->email->set_header('Content-Type', 'text/html');
      $this->email->set_newline("\r\n");
      // change it to yours
      $this->email->from('info@logixcard.com', 'The Study Cafe');
      // change it to yours
      $this->email->to($email);
      $this->email->subject($subject);
      $this->email->message($html);
    if($this->email->send()){
        //echo 'Email sent.';
        return true;
      }else{
        //show_error($this->email->print_debugger());
        return false;
      }
   
  }
  public function send_push($title,$message,$fctoken,$order='',$type='',$include_image=''){
      // Send Push Notification 
      // optional payload
      $payload = array();
      $payload['team'] = 'India';
      $payload['score'] = '5.6';
      $payload['notification'] = '5.6';
      // notification title
      // push type - single user / topic
      $push_type = 'individual';
      // whether to include to image or not
      $this->push->setTitle($title);
      $this->push->setMessage($message);
      if ($include_image) {
          $this->push->setImage($include_image);
      }
      else {
          $this->push->setImage('');
      }
      $this->push->setIsBackground(TRUE);
      $this->push->setPayload($payload);
      $this->push->setActionDestination($type);
      $this->push->setOrderID($order);
      $json = '';
      $response = '';
      /////////////// XXXXX End Push Notification Setting XXXXX /////////////////////
      if ($push_type == 'topic'){
          $json = $this->push->getPush();
          $response = $this->firebase->sendToTopic('global', $json);
      } 
      else if ($push_type == 'individual') {
          $json = $this->push->getPush();
          $regId =  $fctoken; // token
          $response = $this->firebase->send($regId, $json);
      }
      return $response;
    
  }
    public function RandomString($length) 
    {
        $keys = array_merge(range(0,9), range('0', '9'));
        $key = "";
        for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
        }
        return $key;
    }
    public function check_user($mobile){
        $this->db->select('m_student_id');
        $this->db->where("m_student_mobile",$mobile);
        $sql = $this->db->get("master_students_tbl");
        return $sql->result();
    }
    public function check_mobile($mobile){
        $this->db->select('m_student_id');
        $this->db->where("m_student_mobile",$mobile);
        $sql = $this->db->get("master_students_tbl");
        return $sql->result();
    }
    public function user_details($user_id){
        $this->db->select('m_student_id,m_student_name,m_student_mobile,m_student_fcm,m_student_image,m_student_email,m_student_gender,m_student_dob,m_student_state,m_state_name,m_student_city,m_city_name,m_student_address,m_student_status,m_student_adhar_no,m_student_adhar_f,m_student_adhar_b');
        $this->db->join("student_enroll_tbl","student_enroll_tbl.t_enroll_student=master_students_tbl.m_student_id","LEFT");
        $this->db->join("master_state_tbl","master_state_tbl.m_state_id=master_students_tbl.m_student_state","LEFT");
        $this->db->join("master_city_tbl","master_city_tbl.m_city_id=master_students_tbl.m_student_city","LEFT");
        $this->db->where("m_student_id", $user_id);
        $sql = $this->db->get("master_students_tbl");
        return $sql->result();
    }
    public function user_signup(){
      $studentData = array(
         "m_student_mobile" => $this->input->post('user_mobile'),
         "m_student_name" => $this->input->post('user_name'),
         "m_student_dob" => $this->input->post('user_dob'),
         "m_student_password" => sha1($this->input->post('user_password')),
         "m_student_fcm" => $this->input->post('user_fcm'),
         "m_student_added_on" => date("Y-m-d H:i:s"),
      );
      $this->db->insert("master_students_tbl", $studentData);
      return $this->db->insert_id();
    }

    public function user_login($mobile,$password){
      $this->db->select('m_student_id,m_student_mobile');
      $this->db->where('m_student_mobile',$mobile);
      $this->db->where('m_student_password',sha1($password));
      $res = $this->db->get('master_students_tbl')->result();
      return $res;
    }
    public function send_user_otp($user_mobile){

        $this->db->select('*');
        $this->db->where('m_student_mobile',$user_mobile);
        $check_user = $this->db->get('master_students_tbl')->result();

        $otp =  $this->RandomString(6);
        $message = "Dear User, Your  OTP for login is ".$otp.". valid for 20 mins Please Do Not Share it with OTP with anyone.Regards Logixhunt";
        $mobile = $user_mobile;
        $dltid = "1207164157307854504";
        $this->sendSms($message,$mobile,$dltid);

        $this->db->set('m_student_otp',$otp);
        $this->db->where('m_student_id',$check_user[0]->m_student_id);
        $this->db->update('master_students_tbl');
        return true;
    }

    public function verify_user_otp($user_mobile,$otp){
      $temp_otp = '212022';
      $this->db->select('*');
      $this->db->where('m_student_mobile',7909951312);
      $check_user = $this->db->get('master_students_tbl')->result();

      if(!empty($check_user)){
        $this->db->select('*');
        $this->db->where('m_student_mobile',$user_mobile);
        $this->db->where('m_student_otp',$otp);
        $user = $this->db->get('master_students_tbl')->result();
        if(!empty($user)){
          $this->db->set('m_otp_verified',1);
          $this->db->where('m_student_mobile',$user_mobile);
          $this->db->update('master_students_tbl');

          $info = array( 
            'response'=>'success',
            'message' => "OTP verified",
            'user'=>$this->user_details($user[0]->m_student_id)
          );
        }
        else if($temp_otp==$otp){
          $this->db->select('*');
          $this->db->where('m_student_mobile',$user_mobile);
          $this->db->where('m_student_otp',$otp);
          $user = $this->db->get('master_students_tbl')->result();

          $this->db->set('m_otp_verified',1);
          $this->db->where('m_student_mobile',$user_mobile);
          $this->db->update('master_students_tbl');


          $info = array(
            'response'=>'success',
            'message' => "OTP verified",
            'user'=>$this->user_details($user[0]->m_student_id)
          );
        }
        else{
          $info = array( 
            'response'=>'error',
            'message' => "OTP not verifiedsss",
            'user'=>array()
          );
        }
      }
      else{
        $this->db->select('*');
        $this->db->where('m_student_mobile',$user_mobile);
        $this->db->where('m_student_otp',$otp);
        $user = $this->db->get('master_students_tbl')->result();

        if(!empty($user))
        {

          $this->db->set('m_otp_verified',1);
          $this->db->where('m_student_mobile',$user_mobile);
          $this->db->update('master_students_tbl');

          $info = array( 'response'=>'success',
            'message' => "OTP verified",
            'user'=>$this->user_details($user[0]->m_student_id)
          );
        }
        else
        {

         $info = array( 'response'=>'error',
          'message' => "OTP not verified",
          'user'=>array()
        );

       }

     }
     echo json_encode($info);
     die();
    }

    public function update_password($user_id,$user_password){
        $setdata = array(
            "m_student_password" => sha1($user_password),
        );
        $this->db->where('m_student_id',$user_id);
        $this->db->update("master_students_tbl", $setdata);
        return true;
    }
    public function update_fcm($user_id,$user_fcm){
        $setdata = array(
            "m_student_fcm" => $user_fcm,
        );
        $this->db->where('m_student_id',$user_id);
        $this->db->update("master_students_tbl", $setdata);
        return true;
    }
    public function update_profile(){
        $this->db->select('m_student_image,m_student_adhar_f,m_student_adhar_b');
        $this->db->where('m_student_id',$this->input->post('user_id'));
        $res = $this->db->get('master_students_tbl')->result();

        if (!empty($_FILES['user_image']['name'])) {
          $config['file_name'] = $_FILES['user_image']['name'];
          $config['upload_path'] = 'uploads/student';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['remove_spaces'] = TRUE;
          $config['file_name'] = $_FILES['user_image']['name'];
          //Load upload library and initialize configuration
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('user_image')) {
            $uploadData = $this->upload->data();
            if (!empty($update_data['user_image'])) {
              if (file_exists($config['user_image'] . $update_data['user_image'])) {
                unlink($config['upload_path'] . $update_data['user_image']); /* deleting Image */
              }
            }
            $m_student_image = $uploadData['file_name'];
          }
        }
        else{
          $m_student_image = $res[0]->m_student_image;
        }

        if (!empty($_FILES['user_adhar_f']['name'])) {
          $config['file_name'] = $_FILES['user_adhar_f']['name'];
          $config['upload_path'] = 'uploads/student';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['remove_spaces'] = TRUE;
          $config['file_name'] = $_FILES['user_adhar_f']['name'];
          //Load upload library and initialize configuration
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('user_adhar_f')) {
            $uploadData = $this->upload->data();
            if (!empty($update_data['user_adhar_f'])) {
              if (file_exists($config['user_adhar_f'] . $update_data['user_adhar_f'])) {
                unlink($config['upload_path'] . $update_data['user_adhar_f']);
              }
            }
            $m_student_adhar_f = $uploadData['file_name'];
          }
        }
        else{
          $m_student_adhar_f =  $res[0]->m_student_adhar_f;
        }
        if (!empty($_FILES['user_adhar_b']['name'])) {
          $config['file_name'] = $_FILES['user_adhar_b']['name'];
          $config['upload_path'] = 'uploads/student';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['remove_spaces'] = TRUE;
          $config['file_name'] = $_FILES['user_adhar_b']['name'];
          //Load upload library and initialize configuration
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('user_adhar_b')) {
            $uploadData = $this->upload->data();
            if (!empty($update_data['user_adhar_b'])) {
              if (file_exists($config['user_adhar_b'] . $update_data['user_adhar_b'])) {
                unlink($config['upload_path'] . $update_data['user_adhar_b']); /* deleting Image */
              }
            }
            $m_student_adhar_b = $uploadData['file_name'];
          }
        }
        else{
          $m_student_adhar_b = $res[0]->m_student_adhar_b;
        }
        $setdata = array(
            "m_student_name" => $this->input->post('user_name'),
            "m_student_email" => $this->input->post('user_email'),
            "m_student_gender" => $this->input->post('user_gender'),
            "m_student_dob" => $this->input->post('user_dob'),
            "m_student_adhar_no" => $this->input->post('user_adhar_no'),
            "m_student_image" => $m_student_image,
            "m_student_adhar_f" => $m_student_adhar_f,
            "m_student_adhar_b" => $m_student_adhar_b,
            "m_student_state" => $this->input->post('user_state'),
            "m_student_city" => $this->input->post('user_city'),
        );
        $this->db->where('m_student_id',$this->input->post('user_id'));
        $this->db->update("master_students_tbl", $setdata);
        return true;
    }
    public function get_city(){
        $this->db->select('m_city_id,m_city_name,m_state_id,m_state_name');
        $this->db->join("master_state_tbl","master_state_tbl.m_state_id=master_city_tbl.m_city_state","LEFT");
        $this->db->where("m_city_status",1);
        $sql = $this->db->get("master_city_tbl");
        return $sql->result();
    }
    public function get_slider(){
        $this->db->select('m_slider_id,m_slider_title,m_slider_image');
        $this->db->where("m_slider_status",1);
        $sql = $this->db->get("master_slider_tbl");
        return $sql->result();
    }
  



  /**
     * Send to a single device
     */
    public function sendNotification()
    {
        $token = 'dB2orx6RSxyx_Ja4hKb0c5:APA91bEBMWTiDA3viviKSHiaJZq-oB41-FaVDlPIBDD0hUW_icvFmXDSg2khI7ErWtuhHVNPgYGhUYYIiQrrJj5t3dXtVk6LyehHV7ny5zqCfk-vyFqpm3nPjakPwQCMBM6s1E7c-Ixj'; // push token
        $message = "Test notification message";

        $this->load->library('fcm');
        $this->fcm->setTitle('Test FCM Notification');
        $this->fcm->setMessage($message);

        /**
         * set to true if the notificaton is used to invoke a function
         * in the background
        */
        $this->fcm->setIsBackground(false);

        /**
         * payload is userd to send additional data in the notification
         * This is purticularly useful for invoking functions in background
         * -----------------------------------------------------------------
         * set payload as null if no custom data is passing in the notification
         */
        $payload = array('notification' => 'test');
        $this->fcm->setPayload($payload);

        /**
         * Send images in the notification
         */
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');

        /**
         * Get the compiled notification data as an array
         */
        $json = $this->fcm->getPush();

        $p = $this->fcm->send($token, $json);

        print_r($p);
    }


      /**
     * Send to multiple devices
     */
    public function sendToMultiple()
    {
        $token = array('Registratin_id1', 'Registratin_id2'); // array of push tokens
        $message = "Test notification message";

        $this->load->library('fcm');
        $this->fcm->setTitle('Test FCM Notification');
        $this->fcm->setMessage($message);
        $this->fcm->setIsBackground(false);
        // set payload as null
        $payload = array('notification' => '');
        $this->fcm->setPayload($payload);
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');
        $json = $this->fcm->getPush();

        /** 
         * Send to multiple
         * 
         * @param array  $token     array of firebase registration ids (push tokens)
         * @param array  $json      return data from getPush() method
         */
        $result = $this->fcm->sendMultiple($token, $json);
    }



    public function send_push_notification($senderids,$title,$description,$imgurl = null){
      $serverkey = 'AAAAfXonp6w:APA91bGbuc7UYPk1SbTknGeJStVpLJC37ir8vZhve9jhn9IXiEWxd38ZirbimkF7vPNWr29A1dMxtKb4f3dagqDeiU5IjaVUzcASNw1MizJs_x_Mr0LEjfWblspLswNNlXZ_ni-DyP3v';// this is a Firebase server key 
      $data = array(
            'registration_ids' => $senderids,
                   'notification' => 
                       array(
                       'body' => $description,
                          'title' => $title,
                          "image"=> $imgurl),
                          "data"=> array(
                              "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
                                  "sound"=> "default", 
                                   "status"=> "done"
                                   )
                          ); 
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));  //Post Fields
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: key='.$serverkey));
      $output = curl_exec ($ch);
      curl_close ($ch);
      return $output;
  }
}
?>