
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

                        <a style="margin-right: 5px;" href="<?php echo site_url('Slider/add_slider')?>" class="btn btn-info btn-vsm"><i class="fa fa-plus"></i> Add</a>

                        <a style="margin-right: 5px;" href="<?php echo site_url('Welcome')?>" class="btn btn-info btn-vsm"><i class="fa fa-long-arrow-left"></i> Back</a>
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
                   <table id="custom_tbl" class="my_custom_datatable table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th width="5%">#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php
                            $i=1;
                            if(!empty($all_value)){
                            foreach($all_value as $value){
                                $edit_link= site_url('Slider/edit_slider?edid=').$value->m_slider_id;
                            ?>   
                               <tr>
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $value->m_slider_title;?></td>
                                 <td>
                                    <button  class="btn btn-success btn-action btn-block" data-toggle="modal" data-target="#myModal<?php echo $value->m_slider_id;?>" title="View">View</button>

                                       <div id="myModal<?php echo $value->m_slider_id;?>" class="modal fade" role="dialog">
                                         <div class="modal-dialog">

                                           <!-- Modal content-->
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 class="modal-title"><?php echo $value->m_slider_title;?></h4>
                                             </div>
                                             <div class="modal-body">
                                                <label>Image:</label>
                                                <p>
                                                <?php 
                                                if (!empty($value->m_slider_image)) {
                                                    $student_img = base_url('uploads/slider/').$value->m_slider_image;
                                                } 
                                                else{
                                                    $student_img = base_url('uploads/Category/defaultimg.jpg');
                                                }
                                                ?>
                                                <img src="<?php echo $student_img; ?>" alt="Profile Photo" style="width: 100%;height: 204px;">
                                                </p>
                                             </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                             </div>
                                           </div>

                                         </div>
                                    </div>
                                 </td>
                                 <td>
                                    <?php
                                    if (!empty($value->m_slider_status==1)){
                                    ?>
                                       <a  class="btn btn-success btn-action" title="Active" data-toggle="Active">Active</a>
                                    <?php
                                    }
                                    else{
                                    ?>
                                       <a  class="btn btn-danger btn-action" title="In-Active" data-toggle="In-Active">In-Active</a>
                                    <?php
                                    }
                                    ?>
                                 </td>
                                 <td title="Action" style="white-space: nowrap;">
                                   <!--  <a href="<?php echo $edit_link; ?>" class="btn btn-info btn-action" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>  -->

                                    <a href="<?php echo $edit_link; ?>" class="btn btn-success btn-action" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>

                                    <button class="btn btn-danger btn-action delete-data" data-value="<?php echo $value->m_slider_id; ?>" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></button>
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
      <!-- End Advance Form Row -->
      <!-- ====================/Page Content======================= -->
      <!-- =========================View=================Fix======= -->
      <!-- End Widget Row -->
   </div>
</div>





<!-- ========================/View=================Fix======= -->
<!-- ========================Footer================Fix======= -->
<?php $this->view('top_footer') ?>
<?php $this->view('js/js_slider') ?>
<?php   $this->view('js/custom_js'); ?>
