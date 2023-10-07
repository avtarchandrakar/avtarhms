
<!-- ========================Header==============Fix========= --> 
<?php $this->view('top_header') ?>
<!-- =======================/Header==============Fix========= -->
<!-- =========================View===============Fix========= -->
<!-- Right Side Content Start -->
<style type="text/css">
  /**/.main-header ul, .main-header ol{
    margin : 0px !important;
    padding: 0px !important;
  }

  /**/.menu-section ul, .menu-section ol{
    margin : 0px !important;
    padding: 0px !important;
  }
  ul,
  ol {
    margin: 10px !important;
    padding: 10px !important;
  }

  li{
    list-style-type: inherit;
  }
</style>
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
                  <div class="col-md-6  col-sm-6">
                     <div class="seipkon-breadcromb-left">
                        <h3>Search Patient</h3><br><input type="text" name="search" id="search" class="form-control"  placeholder=" Enter Patient Name">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="page-box">
               <div class="advance-table">
                   <form method= "post" id="frm-add-data">
                        <div class="row">
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>From Date<span class="text-danger">*</span></label>
                                 <input type="text" name="from" id="from" class="form-control cdate"  placeholder=" Enter From Date" required="" value="<?=date('d-m-Y')?>">
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>To Date<span class="text-danger">*</span></label>
                                 <input type="text" name="to" id="to" class="form-control cdate"  placeholder=" Enter To Date" required="" value="<?=date('d-m-Y')?>">
                              </div>
                           </div>
                           <div class="col-md-1">
                              <div class="form-group">
                                 <label>&nbsp;<span class="text-danger"></span></label>
                                 <button type="submit" id="btn-add-data" class="btn btn-block btn-info">View</button>
                              </div>
                           </div>
                        </div>
                     </form>
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
<?php $this->view('js/js_opd') ?>
<?php   $this->view('js/custom_js'); ?>
