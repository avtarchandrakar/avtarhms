<?php date_default_timezone_set('Asia/Kolkata'); ?>
<!-- =========================View==============Fix========== -->

<!-- ========================Header==============Fix========= --> 
<?php $this->view('top_header') ?>
<!-- =======================/Header==============Fix========= -->

<!-- =========================View===============Fix========= -->
  <!-- Right Side Content Start -->
    <div class="page-content">
      <div class="container-fluid">
<!-- ========================/View===============Fix========= -->

<!-- ======================Page Style======================== -->
<style type="text/css">
    .info-box {
      background: none;
      height: 129px;
      background-image: url(uploads/circle.svg);
      background-repeat: no-repeat;
      background-position: right;
      background-size: 100%;
    }

    .info-box-icon>img {
      max-width: 100%;
    }

    .info-box-icon {
      border-radius: 100px;
      width: 50px;
      height: 50px;
      background-color: #0e84ae;
      color: white;
      font-size: 19px;
      line-height: 50px;
      margin: 16px;
      display: block;
      float: left;
      text-align: center;
    }

    .info-box-text {
      text-transform: capitalize;
      font-size: 17px;
      overflow: visible;
      color: white;
      font-weight: 700;
    }

    .info-box-content {
      margin-left: 0px;
      margin-right: 11px;
    }

    .info-box-number {
      display: block;
      font-weight: 700;
      font-size: 30px;
      color: white;
      margin-top: 15px;
      float: right;
  }


  .box {
    position: relative;
      border-radius: 3px;
      background: #ffffff;
     border:none;
      margin-bottom: 20px;
      width: 100%;
      box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.12), 0 1px 5px 0 rgba(0,0,0,.2);
  }

  .crd {
    border-radius: 5px;
    margin-bottom: 10px;
  }

  .skin-blue .main-sidebar {
    position: sticky;
      top: 0;
      padding: 0px;
      float: left;
      box-shadow: 0px 8px 14.72px 1.28px rgba(159, 150, 226, 0.7);
      height: 800px;
  }


  .sidebar-menu>li {
    width: 95%;
  }

  .skin-blue .sidebar-menu>li>.treeview-menu {
    background: white;
  }

  .skin-blue .treeview-menu>li>a {
      color: #2d3144;
      margin-top: 1em;
      margin-bottom: 1em;
  }

  .skin-blue .treeview-menu>li>a:hover {
    color: #002cff;
    
  }

  .flexistart {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }
  .seacrh-box{
    width: 40%;
    display: inline-table;
    height: 25px;
  }
  .f-size{
    font-size: 12px !important;
  }
  .seats-row{
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    padding: 0 10px;
    justify-content: center;
  }
  .seats-row .seat-col{
    padding-right: 5px !important;
    padding-left: 0;
    min-height: 650px;
  }
  .seats-row .seat-col.sec-5{
    min-height: 500px;
  }
  .seat{
    aspect-ratio: 1/1;
    color: white;
    font-size: 1.2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 5px;
    border-radius: 5px;
  }
  .seat-avilable{
    background: #86B5CF;
  }
  .seat-booked{
    background-color: #E7AF2E;
  }
  .seat-maintance{
    background-color: #FF3131;
  }
  .seat-gap{
    background-color: #929292;
  }
  .seat-none{
    background-color: transparent;
  }
  .seat-card{
    padding: 10px;
    background-color: #e5e5e5;
    border-radius: 1rem;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
</style>
<!-- =====================/Page Style======================== -->

<!-- ======================Page Title======================== --> 
<!-- Breadcromb Row Start -->
<div class="row">
   <div class="col-md-12">
      <div class="breadcromb-area" style="box-shadow: none;">
         <div class="row">
            <div class="col-md-4  col-sm-4">
               <div class="seipkon-breadcromb-left">
                  <h3>Dashboard</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="plan-map">
  <div class="row">
   <div class="col-md-3 col-sm-6 col-xs-12"><br>
            <a href="<?php echo site_url('Branch') ?>">
      <div style="background: linear-gradient(45deg,#0288d1,#26c6da)!important; box-shadow: inset 20px -4px 20px 3px #48c1df;" class="crd">
   
         <div class="info-box">
            <div class="col-md-8 flexistart">
            <span class="info-box-icon"><i class="fa fa-user" aria-hidden="true"></i>
            </span>
             <span class="info-box-text"><span class="f-size">No of</span> Data</span>
      </div>
      <div class="col-md-4">
            <div class="info-box-content">
               <span class="info-box-number"></span>
            </div> <!-- /.info-box-content -->
            </div>
         </div> <!-- /.info-box -->
      </div>
            </a>
   </div> <!-- /.col -->

 
   <div class="col-md-3 col-sm-6 col-xs-12"><br>
            <a href="<?php echo site_url('Students/Student_list') ?>">
      <div style="background: linear-gradient(45deg,#ff5252,#f48fb1)!important; box-shadow: inset 20px -4px 20px 3px #f997ab;" class="crd">
         <div class="info-box">
          <div class="col-md-8 flexistart">
            <span style="background: #ce5a65;" class="info-box-icon"><i class="fa fa-user" aria-hidden="true"></i> </span>
             <span class="info-box-text"><span class="f-size">No of</span> Data</span>
            </div>
             <div class="col-md-4">            
            <div class="info-box-content">
               <span class="info-box-number"></span>
            </div> <!-- /.info-box-content -->
            </div>
         </div> <!-- /.info-box -->
      </div>
            </a>
   </div> <!-- /.col -->

   <!-- fix for small devices only -->
   <div class="clearfix visible-sm-block"></div>

   <div class="col-md-3 col-sm-6 col-xs-12"><br>
    <!-- <a href="" style="cursor: none"> -->
      <div style="background: linear-gradient(45deg,#ff6f00,#ffca28)!important; box-shadow: inset 20px -4px 20px 3px #ffbb48;" class="crd">
         <div class="info-box">
          <div class="col-md-8 flexistart">
            <span style="background: #d1760c;" class="info-box-icon "><i class="fa fa-user" aria-hidden="true"></i></span>
             <span class="info-box-text"><span class="f-size">No of</span> Data</span>
             </div>
            <div class="col-md-4">
            <div class="info-box-content">
               <span class="info-box-number"></span>
            </div> <!-- /.info-box-content -->
            </div>
         </div>
      </div><!-- /.info-box -->
    <!-- </a> -->
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12"><br>
     <!-- <a href="" style="cursor: none"> -->
      <div style="background: linear-gradient(45deg,#43a047,#1de9b6)!important; box-shadow: inset 20px -4px 20px 3px #57d6a1;" class="crd">
         <div class="info-box">
          <div class="col-md-8 flexistart">
            <span style="background: #d1760c;" class="info-box-icon "><i class="fa fa-user" aria-hidden="true"></i> </span>
             <span class="info-box-text"><span class="f-size">No of</span> Data</span>
             </div>
            <div class="col-md-4">
              <div class="info-box-content">
                 <span class="info-box-number"></span>
                 
              </div> <!-- /.info-box-content -->
              <div class="info-box-content">
                <span class="info-box-number"></span>
              </div>
            </div>
         </div>
      </div><!-- /.info-box -->
     <!-- </a> -->
    </div>
  
    </div>
</section>


<div class="row">
 <div class="col-md-12">
    <div class="page-box">
      <div style="overflow-x: scroll;">
      <h4>List</h4>
      <div class="advance-table">
        <table id="custom_tbl" class="my_custom_datatable table table-striped table-bordered">

           <thead>

               <tr>

                    <th width="5%">#</th>

                    <th>List1</th>

                    <th>List12</th>

                    <th>List13</th>

                    <th>List4</th>

                    <th>List5</th>
                    <th>Action</th>

               </tr>

           </thead>

           <tbody>

            <?php

               /* $i=1;

                if(!empty($all_value)){

                foreach($all_value as $value){
                    $view_link= site_url('Booking/booking_details?edid=').$value->m_booking_id;
                    $future = strtotime($value->m_booking_end);
                    $now = time();
                    $timeleft = $future-$now;
                    $daysleft = round((($timeleft/24)/60)/60);

                    if(!empty($daysleft)){
                    ?>

                    <?php
                    }
                    else{
                        
                    }*/
                ?>   

                   <!-- <tr>

                     <td><?php echo $i;?></td>

                     <td><?php echo $value->m_booking_no;?></td>

                     <td><?php echo $value->m_student_name;?></td>

                     <td><?php echo $value->m_booking_room_id;?></td>

                     <td><?php echo $value->m_booking_seat_no;?></td>

                     <td><?php echo $value->m_plan_name;?></td>

                     <td><?php echo $value->m_booking_price;?></td>

                     <td>

                        <?php echo $daysleft;?>

                     </td>

                     <td><?php echo date('d-m-Y',strtotime($value->m_booking_added_on));?></td>

                     <td title="Action" style="white-space: nowrap;">

                       <a href="<?php echo $view_link; ?>" class="btn btn-info btn-action" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> 

                      </td>

                   </tr> -->

                <?php

                /*$i++;

                }

                }*/

              ?>

           </tbody>

       </table> 
      </div>  
      </div>
    </div>
  </div>
</div>

    
        
</div>
      </div>

<!-- ========================Footer================Fix======= -->
<?php $this->view('top_footer') ?>
<?php $this->view('js/dashboard_js');?>
<?php $this->view('js/custom_js'); ?>
<!-- =======================/Footer================Fix======= -->

<!-- =======================/Script========================== -->


         