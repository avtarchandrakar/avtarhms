
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

                     <a style="margin-right: 5px;" href="<?php  echo site_url('Billing_Item_Group/billing_group_form'); ?>" class="btn btn-info btn-vsm"><i class="fa fa-long-arrow-left"></i> Back</a>
                     
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
                           <div class="col-md-4">
                              <div class="form-group">
                                 <input type="hidden" name="edit_id" value="<?php echo $a_value[0]->id;?>">
                                 <label>Item Name<span class="text-danger">*</span></label>
                                 <input type="text" name="names" id="names" class="form-control"  placeholder=" Enter Item Name" required=""  value="<?php echo $a_value[0]->name;?>" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Item Group<span class="text-danger">*</span></label>
                                 <select name="group_id" id="group_id" class="form-control select2" title="Select Item Group" required>
                                    <?php
                                    if(!empty($item_group)){
                                       foreach($item_group as $item_g){
                                       ?>
                                       <option value="<?php echo $item_g->id;?>" <?php if($a_value[0]->group_id==$item_g->id) echo 'selected';?>><?php echo $item_g->name;?></option>
                                       <?php
                                       }
                                    } 
                                    ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Service Code<span class="text-danger">*</span></label>
                                 <input type="text" name="service_code" value="<?php echo $a_value[0]->service_code;?>"  id="service_code" class="form-control"  placeholder=" Enter Service Code" required="" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Credit To<span class="text-danger">*</span></label>
                                 <select name="credit_to" id="credit_to" class="form-control select2" title="Select Include In IPD Bill" required>
                                    <option value="ContEntry" <?php if($a_value[0]->credit_to=='ContEntry') echo 'selected';?>>Consultant in Entry</option>
                                    <option value="Fix" <?php if($a_value[0]->credit_to=='Fix') echo 'selected';?>>Consultant Fix</option>
                                    <option value="Hospital" <?php if($a_value[0]->credit_to=='Hospital') echo 'selected';?>>Hospital</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Perc %<span class="text-danger">*</span></label>
                                 <input type="text" value="<?php echo $a_value[0]->perc;?>"  name="perc" id="perc" class="form-control"  placeholder=" Perc %" required="" >
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
                                       <option value="<?php echo $depart->id;?>" <?php if($a_value[0]->department_id==$depart->id) echo 'selected';?>><?php echo $depart->name;?></option>
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
                                    <option value="1" <?php if($a_value[0]->status=='1') echo 'selected';?>>Active</option>
                                    <option value="0" <?php if($a_value[0]->status=='0') echo 'selected';?>>In-Active</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-layout-submit">
                                 <button type="submit" id="btn-add-data" class="btn btn-block btn-info">Update</button>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-layout-submit">
                              <a href="<?php echo site_url('Billing_items/billing_item_form') ?>" class="btn btn-block btn-danger">Reset</a>
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
<?php $this->view('js/js_billing_item') ?>
<?php $this->view('js/custom_js'); ?>
<!-- ========================Script==========================