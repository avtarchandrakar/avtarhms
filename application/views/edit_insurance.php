
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

                     <a style="margin-right: 5px;" href="<?php  echo site_url('insurance/insurance_list'); ?>" class="btn btn-info btn-vsm"><i class="fa fa-long-arrow-left"></i> Back</a>
                     
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
                    <form method= "post" id="frm-update-data">
                        <div class="row">
                           <input type="hidden" name="edit_id" value="<?php echo $a_value[0]->id;?>">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Insurance Name<span class="text-danger">*</span></label>
                                 <input type="text" name="name" id="name" class="form-control"  placeholder=" Enter Insurance Name" required="" value="<?php echo $a_value[0]->name;?>">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Tariff<span class="text-danger">*</span></label>
                                 <select name="tariff" id="tariff" class="form-control select2" title="Select Status"  required>
                                    <option value="1">Select Tariff</option>
                                    <?php
                                    if(!empty($tariff_list)){
                                       foreach($tariff_list as $tariffrow){
                                       ?>
                                       <option value="<?php echo $tariffrow->id;?>" <?php if($a_value[0]->parent==$tariffrow->id) echo 'selected';?>><?php echo $tariffrow->name;?></option>
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
                                 <select name="status_data" id="status_data" class="form-control" title="Select Status" required>
                                    <option value="1" <?php if($a_value[0]->status_data=='1') echo 'selected';?>>Active</option>
                                    <option value="0" <?php if($a_value[0]->status_data=='0') echo 'selected';?>>In-Active</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-layout-submit">
                                 <button type="submit" id="btn-update-data" class="btn btn-block btn-info">Update</button>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-layout-submit">
                              <a href="<?php echo site_url('insurance/insurance_list') ?>" class="btn btn-block btn-danger">Reset</a>
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
<?php $this->view('js/js_insurance') ?>
<?php $this->view('js/custom_js'); ?>
<!-- ========================Script==========================