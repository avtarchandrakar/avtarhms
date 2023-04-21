
<!-- ========================Header==============Fix========= --> 
<?php $this->view('top_header') ?>

<!-- =======================/Header==============Fix========= -->
<!-- =========================View===============Fix========= -->
<!-- Right Side Content Start -->
<div class="page-content">
   <div class="container-fluid">
      <!-- ========================/View===============Fix========= -->
      <!-- ======================Page Title======================== -->
      <!-- Breadcromb Row Start -->
      <div class="row">
         <div class="col-md-12">
            <div class="breadcromb-area">
               <div class="row">
                  <div class="col-md-6  col-sm-6">
                     <div class="seipkon-breadcromb-left">
                        <h3><?php echo $pagename;?></h3>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-3 pull-right">
                     <div class="seipkon-breadcromb-right">

                     <a style="margin-right: 5px;" href="<?php  echo site_url('Consultants/consultant_form'); ?>" class="btn btn-info btn-vsm"><i class="fa fa-long-arrow-left"></i> Back</a>
                     
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="page-box">
               <div class="form-example">
                  <div class="form-wrap top-label-exapmple form-layout-page">
                    <form method= "post" id="frm-add-data">
                        <div class="row">
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name<span class="text-danger">*</span></label>
                                 <input type="text" name="name" id="name" class="form-control"  placeholder=" Enter Doctor Name" required="" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Qualification<span class="text-danger">*</span></label>
                                 <input type="text" name="qualification" id="qualification" class="form-control"  placeholder=" Enter Qualification Name" required="" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address</label>
                                 <input type="text" name="address" id="address" class="form-control"  placeholder=" Enter Address Name" required="" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile No<span class="text-danger">*</span></label>
                                 <input type="text" name="mobileno" id="mobileno" class="form-control"  placeholder=" Enter Mobile No " required="" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Category<span class="text-danger">*</span></label>
                                 <select name="category" id="category" class="form-control select2" title="Select Category" required>
                                      <option>Consultant</option>
                                      <option>Pediatrics</option>
                                      <option>Surgeon</option>
                                      <option>Anaesthsists</option>
                                      <option>All</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Department<span class="text-danger">*</span></label>
                                 <select name="department" id="department" class="form-control select2" title="Select Department" required>
                                    <option value="1">Department</option>
                                    <?php
                                    if(!empty($department)){
                                       foreach($department as $depart){
                                       ?>
                                       <option value="<?php echo $depart->id;?>"><?php echo $depart->name;?></option>
                                       <?php
                                       }
                                    } 
                                    ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Status<span class="text-danger">*</span></label>
                                 <select name="status" id="status" class="form-control" title="Select Status" required>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-layout-submit">
                                 <button type="submit" id="btn-add-data" class="btn btn-block btn-info">Submit</button>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-layout-submit">
                              <a href="<?php echo site_url('Consultants/consultant_form') ?>" class="btn btn-block btn-danger">Reset</a>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Advance Form Row -->
      <!-- ====================/Page Content======================= -->
      <!-- =========================View=================Fix======= -->
      <!-- End Widget Row -->
   </div>
</div>
<!-- ========================/View=================Fix======= -->
<!-- ========================Footer================Fix======= -->
<?php $this->view('top_footer') ?>
<?php $this->view('js/js_refer') ?>
<?php $this->view('js/custom_js'); ?>
<!-- ========================Script==========================