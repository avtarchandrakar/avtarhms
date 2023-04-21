   <!-- Footer Area Start -->

            <footer class="seipkon-footer-area">

               <p><?php echo get_settings('m_app_name'); ?> | Design & Developed by <a href="https://logixhunt.com/">Logixhunt</a></p>

            </footer>

            <!-- End Footer Area -->

             

         </section>

         <!-- End Right Side Content -->

          

      </div>

      <!-- End Wrapper -->

       

 <!-- Jquery JS-->

      

    <!-- <script src="<?php echo base_url('assets/js/jquery-3.1.0.min.js')?>"></script> -->

    <!-- Bootstrap JS --> 

    <script src="<?php echo base_url('assets/plugins/bootstrap/bootstrap.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/jquery.dataTables.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/dataTables.bootstrap.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/dataTables.buttons.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/buttons.bootstrap.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/buttons.flash.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/buttons.html5.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/buttons.print.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/dataTables.responsive.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/pdfmake.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/jszip.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/js/vfs_fonts.js')?>"></script>



    <!-- Daterange JS -->

    <script src="<?php echo base_url('assets/plugins/daterangepicker/js/moment.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/daterangepicker/js/daterangepicker.js')?>"></script>

    <!-- Perfect Scrollbar JS -->

    <script src="<?php echo base_url('assets/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js')?>"></script>

    

    <script src="" data-backup="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="<?php echo base_url('assets/plugins/sweet-alerts/js/sweetalert.min.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/sweet-alerts/js/custom-sweetalerts.js')?>"></script>

    <!-- Masked Input JS -->

    <script src="<?php echo base_url('assets/plugins/masked-input/js/jquery.maskedinput.min.js')?>"></script>



    <script src="<?php echo base_url('assets/plugins/summernote/js/summernote.js')?>"></script>

    <script src="<?php echo base_url('assets/plugins/summernote/js/custom-summernote.js')?>"></script>



    <!-- Select2 JS -->

    <script src="<?php echo base_url('assets/plugins/select2/js/select2.full.js')?>"></script>

    <!-- Color Picker JS -->

    <script src="<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')?>"></script>

    <!-- Jquery Knob JS -->

    <script src="<?php echo base_url('assets/plugins/jquery-knob/js/jquery.knob.min.js')?>"></script>

    <!-- Advance Component Form JS For Only This Page -->

    <script src="<?php echo base_url('assets/js/advance_component_form.js')?>"></script>

    <script src="<?php echo base_url('assets/js/advance_table_custom.js')?>"></script>

    <!-- Custom JS -->

    <script src="<?php echo base_url('assets/js/seipkon.js')?>"></script>



    <!-- Table To Excel  07-03-2020 -->

    <script src="<?php echo base_url('assets/js/jquery.table2excel.js')?>"></script>



    <!-- <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> -->
    <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js')?>"></script>

    

    <!-- Main JS-->

    </body>

</html>

<?php $this->view('js/sidebar_js') ?>

<script type="text/javascript">

    $('.btn').filter(':not([title])').attr('title','Click Here');

    $('.mynev-links').filter(':not([title])').attr('title','Click Here');

    

    /* icon_input js Start :  use Eg  Hide-Show Password  */

    $(".icon_input").on('click','.input-icon', function(){

      var icon = $(this), icon_input = icon.parent('.icon_input'),

      input = icon_input.children('.icon-input');

      var pre_intype = input.attr('type'), new_intype = input.data('change');

      var pre_incon = icon.data('change0'), new_incon = icon.data('change');



      input.attr('type', new_intype);  input.data('change', pre_intype);

      icon.data('change0', new_incon); icon.data('change', pre_incon);

      icon.removeClass(pre_incon);  icon.addClass(new_incon); 



    });

    /* <div class="form-group">

        <label>Password</label>

        <span class="icon_input">   

          <input type="password" data-change="text" name="" id="" class="form-control icon-input"> 

          <i class='fa fa-eye fa-2x input-icon' aria-hidden='true' data-change0='fa fa-eye' data-change='fa fa-eye-slash'></i>

        </span> 

      </div>  */

    /* icon_input js End :  use Eg  Hide-Show Password  */





function ImageAction(img_input){

  var myuploadimg = $(img_input).val();

  if(myuploadimg==''){ 

    $(img_input).parent('div').removeClass('btn-success');

    $(img_input).parent('div').addClass('btn-info');

    $(img_input).parent('div').attr("title", "Select File");

  }else{

    $(img_input).parent('div').attr("title", "File Selected");

    $(img_input).parent('div').removeClass('btn-info');

    $(img_input).parent('div').addClass('btn-success');

  }

};



</script>

 