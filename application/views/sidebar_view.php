<style type="text/css">
  .sidebar-profile {

    width: 95%;

  }

  .sidebar-navs {

    border-top: 1px solid lightgrey;

    padding: 0px 0px 0px 0px;

    border-bottom: 1px solid lightgrey;

    margin-top: 10px;

  }

  .nav-pills-circle {

    position: relative;

    margin: 0 auto;

    text-align: center;

    justify-content: center;

  }

  .sidebar-navs .nav-pills-circle .nav-link {

    display: block;

    padding: 5px;

    font-size: 14px;

    border: 1px solid #e3e7ed;

    border-radius: 50%;

    line-height: 1.6;

    height: 34px;

    width: 34px;

  }

  .nav {

    display: flex;

    flex-wrap: wrap;

    padding-left: 0;

    margin-bottom: 0;

    list-style: none;

  }


  .nav>li {

    margin: 3px 6px;

  }

  .icon-size{
    height: 24px !important;
    width: 24px !important;
  }
</style>

<!-- Sidebar Start -->

<aside class="seipkon-main-sidebar">

  <nav id="sidebar">

    <!-- Sidebar Profile Start -->

    <div class="sidebar-profile clearfix">

      <div class="profile-avatar" style="border: 1px solid #0000000a; border-radius: 50%;">

        <?php

        $user_img = base_url('assets/img/default-user0.png');

        if (!empty($log_user_dtl[0]->m_admin_img)) {

          if (file_exists('uploads/' . $log_user_dtl[0]->m_admin_img)) {

            $user_img = base_url('uploads/') . $log_user_dtl[0]->m_admin_img;
          }
        }

        ?> <img src="<?php echo $user_img; ?>" class="img-responsive" alt="profile" style="width: 100%; height: 100%;" /> </div>

      <div class="profile-info">

        <p>Welcome !</p>

        <h4> <?php echo $log_user_dtl[0]->m_admin_name; ?></h4>
      </div>

      <div class="clearfix"></div>

      <div class="sidebar-navs">

        <ul class="nav  nav-pills-circle">



          <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Users List">

            <a style="background: deepskyblue; color: white;" class="nav-link text-center m-2" href="<?php echo site_url('Students/student_list'); ?>"> <i class="fa fa-user"></i> </a>

          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Slider">

            <a style="background: #3F51B5; color: white;" class="nav-link text-center m-2" href="<?php echo site_url('Slider'); ?>"> <i class="fa fa-list"></i> </a>

          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">

            <a style="background: red; color: white;" class="nav-link text-center m-2" href="<?php echo Site_url('Logout') ?>"> <i class="fa fa-power-off"></i> </a>

          </li>

        </ul>

      </div>

    </div>

    <!-- Sidebar Profile End -->

    <!-- Menu Section Start -->

    <div class="menu-section">

      <h3>General</h3>

      <ul class="list-unstyled components mynev-menus activation">

        <li class="">

          <a href="<?php echo site_url('Welcome') ?>" class="mynev-links"><img class="icon-size" src="<?php echo base_url('uploads/icon/house.png');?>"> Dashboard </a>

        </li>
        
        <li class="">

          <a href="<?php echo site_url('Opd/index') ?>" class="mynev-links"> <img class="icon-size" src="<?php echo base_url('uploads/icon/student.png');?>"> OPD </a>
        </li>

        <li>
          <a href="#ipd" data-toggle="collapse" aria-expanded="false"> <img class="icon-size" src="<?php echo base_url('uploads/icon/database.png');?>"> IPD</a>
          <ul class="collapse list-unstyled mynev-submenus" id="ipd">
            <li><a href="<?php echo site_url('Ipd/admission') ?>" class="mynev-links">Patient Admission</a></li>
            <li><a href="<?php echo site_url('Ipd/patients') ?>" class="mynev-links">Admit Patient</a></li>
          </ul>
        </li>

        <li class="">
          <a href="<?php echo site_url('Students/student_list') ?>" class="mynev-links"> <img class="icon-size" src="<?php echo base_url('uploads/icon/student.png');?>"> Users List </a>
        </li>


        <li>
          <a href="#Listings1" data-toggle="collapse" aria-expanded="false"> <img class="icon-size" src="<?php echo base_url('uploads/icon/database.png');?>"> Masters</a>
          <ul class="collapse list-unstyled mynev-submenus" id="Listings1">
            <li><a href="<?php echo site_url('Consultants/consultant_form') ?>" class="mynev-links">Consultant Dr.</a></li>
            <li><a href="<?php echo site_url('Referdrs/referdr_form') ?>" class="mynev-links">Refer Dr.</a></li>
            <li><a href="<?php echo site_url('Billing_Item_Group/billing_group_form') ?>" class="mynev-links">Billing Item Group</a></li>
            <li><a href="<?php echo site_url('billing_Items/billing_item_form') ?>" class="mynev-links">Billing Item</a></li>
            <li><a href="<?php echo site_url('Department/department_list') ?>" class="mynev-links">Department</a></li>
            <li><a href="<?php echo site_url('Tariff/tariff_list') ?>" class="mynev-links">Tariff</a></li>
            <li><a href="<?php echo site_url('Company/company_list') ?>" class="mynev-links">Company</a></li>
            <li><a href="<?php echo site_url('patient_category/patient_category_list') ?>" class="mynev-links">Patient Category</a></li>
            <li><a href="<?php echo site_url('insurance/insurance_list') ?>" class="mynev-links">Insurance </a></li>
            <li><a href="<?php echo site_url('Location/state') ?>" class="mynev-links">State</a></li>
            <li><a href="<?php echo site_url('Location/city') ?>" class="mynev-links">City</a></li>
            <li><a href="<?php echo site_url('Slider') ?>" class="mynev-links">Slider</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Menu Section End -->

    <!-- Menu Section Start -->

    <div class="menu-section">

      <h3>Extra Settings</h3>

      <ul class="list-unstyled components mynev-menus">

        <li>

          <a href="#ex_components" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-cog"></i> General Setting </a>

          <ul class="collapse list-unstyled mynev-submenus" id="ex_components">

            <li><a href="<?php echo site_url('Profile') ?>" class="mynev-links">Your Profile </a></li>

            <li><a href="<?php echo site_url('Profile/application_settings') ?>" class="mynev-links">Application Setting </a></li>

          </ul>

        </li>

        <li>

          <a href="<?php echo site_url('Logout') ?>" class="mynev-links"> <i class="fa fa-power-off"></i> Logout </a>

        </li>

      </ul>

    </div>

    <!-- Menu Section End -->

  </nav>

</aside>

<!-- End Sidebar -->