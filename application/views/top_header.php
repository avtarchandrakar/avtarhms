<!DOCTYPE html>

<html lang="en">

<head>

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">



   <?php $hp_name = get_settings('m_app_name'); ?>

   <?php $hp_title = get_settings('m_app_title'); ?>



   <meta name="description" content="<?php echo $hp_title; ?>" />

   <meta name="keywords" content="<?php echo $hp_title; ?>" />

   <meta name="author" content="<?php echo $hp_title; ?>">

   <!-- Title -->

   <title><?php echo (!empty($pagename)) ? $hp_title . " | " . $pagename : $hp_title; ?></title>

   <!-- /Title -->

   <?php

   $img_title = get_settings('m_app_icon');

   if (!empty($img_title)) {

      if (file_exists('uploads/' . $img_title)) {

         $fav_img = base_url('uploads/') . $img_title;
      } else {

         $fav_img  = base_url('assets/img/blank.jpg');
      }
   } else {

      $fav_img  = base_url('assets/img/blank.jpg');
   }

   ?>

   <!-- Favicon -->

   <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $fav_img; ?>">

   <?php





   echo  link_tag('assets/css/animate.min.css');

   echo  link_tag('assets/plugins/bootstrap/bootstrap.min.css');

   echo  link_tag('assets/plugins/font-awesome/font-awesome.min.css');

   echo  link_tag('assets/plugins/themify-icons/themify-icons.css');

   echo  link_tag('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css');

   echo  link_tag('assets/plugins/sweet-alerts/css/sweetalert.css');

   echo  link_tag('assets/plugins/daterangepicker/css/daterangepicker.css');

   // Select2 CSS 

   echo  link_tag('assets/plugins/select2/css/select2.min.css');

   echo  link_tag('assets/plugins/jquery-toggle/css/toggles-full.css');

   echo  link_tag('assets/css/seipkon.css');

   echo  link_tag('assets/css/responsive.css');

   echo  link_tag('assets/plugins/datatables/css/dataTables.bootstrap.min.css');

   echo  link_tag('assets/plugins/datatables/css/buttons.bootstrap.min.css');

   echo  link_tag('assets/plugins/datatables/css/responsive.bootstrap.min.css');



   echo  link_tag('assets/plugins/bootstrap-select/css/bootstrap-select.min.css');

   echo  link_tag('assets/plugins/summernote/css/summernote.css');

   echo  link_tag('assets/css/jquery.timepicker.min.css');
   echo  link_tag('assets/css/bootstrap-datepicker.min.css');





   ?>





   <style type="text/css">
      a.btn:hover {
         outline: 1px solid white;
         /* outline-width: 1px; */
      }

      a.btn:active {
         outline: 1px;
      }



      .btn {



         padding: 5px 8px;

         line-height: 20px;

         border-radius: 5px;

      }



      button.btn-action {

         padding: 3px 0px 3px 5px;

         text-align: center;

         font-size: 20px;

      }



      a.btn-action {

         padding: 3px 5px 3px 5px;

         text-align: center;

         font-size: 14px !important;

      }



      button.btn-action {

         font-size: 14px !important;

      }



      .menu-section li {

         box-shadow: inset 0 0 5px #d9d9d9;

         outline: 1px solid white;

      }

      .menu-section li.active {

         box-shadow: inset 0 0 3px #018080;

      }

      #sidebarCollapse {

         color: white !important;

         border: 2px solid white !important;

      }



      /*.table tr {

   box-shadow: inset 0 0 3px 0px #abb0b0;

}*/



      .table tr:hover {

         box-shadow: 0px 0px 5px grey;

      }

      .text-danger {

         color: red;

      }

      .form-group input:focus,
      .form-group select:focus,
      .form-group textarea:focus {

         border-color: #fe05e0;

         border-bottom-width: 2px;

         box-shadow: 0 0 2px #444af0;

      }

      .select2-container--open .select2-selection {

         border-color: #fe05e0;

         border-bottom-width: 2px;

         box-shadow: 0 0 2px #444af0;

      }

      label {

         margin-bottom: 1px;

      }



      .breadcromb-area {

         background: #ffffff;

         padding: 12px;

         border: 0;

         box-shadow: 0px 10px 10px 20px rgb(176 184 214 / 9%), 10px 10px 15px -5px #b0b8d6;

         border-radius: 4px;

      }

      #content>.page-content {

         min-height: 100vh;

         padding: 12px 10px;

      }

      .page-box {

         margin-top: 10px;

         padding: 9px 6px;

      }



      ul.collapse.in {

         border-bottom: 3px dotted white;

      }



      .dt-buttons {
         margin-left: 2%;
      }





      /* icon_input js Start :  use Eg  Hide-Show Password  */

      .icon_input .input-icon {
         right: 7%;
         position: absolute;
         top: 49%;
      }

      .icon_input .icon-input {
         padding-right: 14% !important;
      }

      /* <div class="form-group">

      <label>Password</label>

      <span class="icon_input">   

        <input type="password" data-change="text" name="" id="" class="form-control icon-input"> 

        <i class='fa fa-eye fa-2x input-icon' aria-hidden='true' data-change0='fa fa-eye' data-change='fa fa-eye-slash'></i>

      </span> 

    </div>  */

      /* icon_input js End :  use Eg  Hide-Show Password  */







      .btn-vsm {

         line-height: 15px;

      }
   </style>



</head>



<body>



   <!-- Start Page Loading --

      <div id="loader-wrapper">

         <div id="loader"></div>

         <div class="loader-section section-left"></div>

         <div class="loader-section section-right"></div>

      </div>

      End Page Loading -->



   <!-- Wrapper Start -->

   <div class="wrapper">

      <!-- Main Header Start -->

      <header class="main-header">







         <!-- Header Top Start -->

         <nav class="navbar navbar-default">

            <div class="container-fluid">

               <div class="header-top-section">

                  <div class="pull-left">



                     <!-- Collapse Menu Btn Start -->

                     <button type="button" id="sidebarCollapse" class=" navbar-btn">

                        <i class="fa fa-bars"></i>

                     </button>

                     <!-- Collapse Menu Btn End -->



                     <!-- Header Top Search Start -->

                     <div class="header-top-search">

                        <h2 style="color: white"><?php echo $hp_title; ?></h2>

                     </div>

                     <!-- Header Top Search End -->



                  </div>

                  <div class="header-top-right-section pull-right">

                     <ul class="nav nav-pills nav-top navbar-right">

                        <li class="dropdown">

                           <a class="dropdown-toggle profile-toggle" href="index.html#" data-toggle="dropdown">

                              <?php

                              $user_img = base_url('assets/img/default-user0.png');

                              if (!empty($log_user_dtl[0]->m_admin_img)) {

                                 if (file_exists('uploads/' . $log_user_dtl[0]->m_admin_img)) {

                                    $user_img = base_url('uploads/') . $log_user_dtl[0]->m_admin_img;
                                 }
                              }

                              ?>

                              <img src="<?php echo $user_img; ?>" class="profile-avator" alt="admin profile" style="border: 1px solid #f7e7e740; border-radius: 50%;" />

                              <div class="profile-avatar-txt">

                                 <p><?php echo $log_user_dtl[0]->m_admin_name; ?></p>

                                 <i class="fa fa-angle-down"></i>

                              </div>

                           </a>

                           <div class="profile-box dropdown-menu animated bounceIn">

                              <ul>

                                 <li><a href="<?php echo site_url('Profile'); ?>"><i class="fa fa-user"></i> view profile</a></li>



                                 <li><a href="<?php echo site_url('Logout'); ?>"><i class="fa fa-power-off"></i> sign out</a></li>

                              </ul>

                           </div>

                        </li>

                        <!-- Profile Toggle End -->



                     </ul>

                  </div>

               </div>

            </div>

         </nav>

         <!-- Header Top End -->



      </header>



      <?php $this->view('sidebar_view'); ?>



      <!-- Right Side Content Start -->

      <section id="content" class="seipkon-content-wrapper">
         <script src="<?php echo base_url('assets/js/jquery-3.1.0.min.js') ?>"></script>

   
         <script>
            $(document).ready(function(e) {

               $("#globelbranch").on("change", function() {

                  var branchid = $(this).val();

                  $.ajax({
                     type: "POST",
                     url: "<?php echo site_url('Welcome/Change_globel_branch'); ?>",
                     data: {
                        branchid: branchid
                     },

                     dataType: "JSON",
                     success: function(data) {
                        if (data.status == 'success') {
                           location.reload();
                        } else {
                           location.reload();
                        }
                     }
                  });

               });


            });
         </script>

<script src="<?php echo base_url('assets/js/datepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.timepicker.js') ?>"></script>