
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
                                 <label>Item Group Name<span class="text-danger">*</span></label>
                                 <input type="text" name="name" id="name" value="<?php echo $a_value[0]->name;?>" class="form-control"  placeholder=" Enter Item Group Name" required="" >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Include In IPD Bill<span class="text-danger">*</span></label>
                                 <select name="ipd_bill" id="ipd_bill" class="form-control select2" title="Select Include In IPD Bill" required>
                                    <option value="No" <?php if($a_value[0]->ipd_bill=='No') echo 'selected';?>>No</option>              
                                    <option value="Yes" <?php if($a_value[0]->ipd_bill=='Yes') echo 'selected';?>>Yes</option>
                                    <option value="Consumable" <?php if($a_value[0]->ipd_bill=='Consumable') echo 'selected';?>>Consumable</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Sort Order<span class="text-danger">*</span></label>
                                 <input type="text" name="sort" id="sort" value="<?php echo $a_value[0]->sort;?>" class="form-control"  placeholder=" Eg. 1 2 3" required="" >
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
                              <a href="<?php echo site_url('Billing_Item_Group/billing_group_form') ?>" class="btn btn-block btn-danger">Reset</a>
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
<?php $this->view('js/js_billing_group') ?>
<?php $this->view('js/custom_js'); ?>
<!-- ========================Script==========================