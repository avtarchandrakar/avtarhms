<!--=========================View==============Fix========== -->
<!-- ========================Header==============Fix========= -->
<?php $this->view('top_header') ?>
<!-- =======================/Header==============Fix========= -->
<!-- =========================View===============Fix========= -->
<div class="page-content">
    <div class="container-fluid">
        <!-- ========================/View===============Fix========= -->
        <!-- ======================Page Title======================== -->
       
        <style type="text/css">
            .d-flex {
            display: flex;
            align-items: center;
            }
            .jbfrm input[type=radio]{
            width: 27px;
            height: 17px;
            margin: 0px;
            background: none;
            box-shadow: none;
            transition: 0.5s;
            }
            .space-around {
            justify-content: space-around;
            }
            .space-around input[type=checkbox]{
            margin: 0px 0px 0px;
            transition: 0.5s;
            width: 20px;
            height: 18px;
            }
            .space-around input[type=checkbox]:focus { outline: none!important; transform: scale(1.2); } 
            .jbfrm input[type=radio]:focus { outline: none!important; transform: scale(1.2); } 
        </style>
 <!-- Breadcromb Row Start -->
<!----------------------------row start------------------------> 
        <div class="row">
            <div class="col-md-12">
                <div class="breadcromb-area">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="seipkon-breadcromb-left">
                                <h3><?php echo $pagename;?></h3>
                            </div>
                        </div>

                    <div class="col-md-6 col-sm-6 pull-right">
                    <div class="seipkon-breadcromb-right">
                        
                          <!-- <a href="<?php echo site_url('Students/add_student') ?>" class="btn btn-info btn-vsm"><i class="fa fa-plus-circle"></i> Add New Student</a> -->
                    </div>
                    </div>
                 
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <div class="breadcromb-area">
                    <form method="get" action="<?php echo site_url('Students/student_list') ?>">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <input class="form-control date_form " type="date" placeholder="From Date" name="from_date" id="m_from_date" value="<?php echo $from_date;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <input class="form-control date_form " type="date" placeholder="To Date" name="to_date" id="m_from_date" value="<?php echo $to_date;?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group" style="margin-top:29px ;">
                                <button class="btn btn-info" type="submit">Search</button>
                                <a href="<?php echo site_url('Students/student_list') ?>"><button class="btn btn-primary" type="button">Reset</button></a>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <div class="page-box">
                    <div style="overflow-x: scroll;">
                        <div class="advance-table">
                            <table id="custom_tbl" class="my_custom_datatable table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Registration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    if(!empty($mech_value)){
                                      foreach($mech_value as $value){
                                         $original_date =$value->m_student_added_on;
                                          $new_date = date("d-m-Y", strtotime($original_date));
                                      ?>
                                        <tr>
                                          <td><?php echo $i;?></td>
                                          <td><?php echo $value->m_student_name;?></td>
                                          <td><?php echo $value->m_student_mobile;?></td>
                                          <td><?php echo $value->m_student_email;?></td>
                                          <td><?php echo $value->m_student_gender;?></td>
                                          <td><?php echo $new_date;?></td>
                                          <td><?php if($value->m_student_status==1)echo "Active";
                                              else{echo "In-Active";} ?></td>
                                         
                                          <td class="wd-30">

                                            <a href="<?php echo base_url('Students/view_student_dtl?id=').$value->m_student_id; ?>" class="btn btn-info btn-action" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                              <a href="<?php echo base_url('Students/add_student?id=').$value->m_student_id; ?>" class="btn btn-info btn-action" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a> 
                                              
                                              <button class="btn btn-danger btn-action delete-student-data" data-value="<?php echo $value->m_student_id; ?>" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></button>
                                          </td>
                                      </tr>
                                      <?php
                                      $i++;
                                      }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
        <!-- View Counselor Area End -->
        <!-- ====================/Page Content======================= -->
        <!-- =========================View=================Fix======= -->
    </div>
</div>
<!-- ========================/View=================Fix======= -->
<!-- ========================Footer================Fix======= -->
<?php $this->view('top_footer'); $this->view('js/js_vendor');
  $this->view('js/custom_js');?>
<!-- =======================/Footer================Fix=======