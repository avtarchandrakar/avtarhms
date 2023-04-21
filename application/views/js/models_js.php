<script type="text/javascript"> 
	$(document).ready(function(e){
		$("form#frm-add").submit(function(e) { e.preventDefault();
		  var clkbtn = $("#btn-add"); clkbtn.prop('disabled',true);
		  var formData = new FormData(this); 
		  $.ajax({
		    type: "POST",
		    url: "<?php echo site_url('Master/insert_model'); ?>",
		    data: formData,
		    processData: false,
		    contentType: false,
		    dataType: "JSON", 
		    success: function(data) {
		      if(data.status=='success'){
		        swal(data.message, {icon: "success", timer: 1000, });
		        setTimeout(function(){
		          window.location = "<?php echo site_url('Master/model_add'); ?>"; 
		        },1000);
		      }else{ clkbtn.prop('disabled',false);
		        swal(data.message, {icon: "error", timer: 5000, });
		      }   
		    }, error: function (jqXHR, status, err){ clkbtn.prop('disabled',false);
		      swal("Some Problem Occurred!! please try again", { icon: "error", timer: 2000, });
		    }
		  });
		});
		$("form#frm-update").submit(function(e) { e.preventDefault();
		  var clkbtn = $("#btn-update"); clkbtn.prop('disabled',true);
		  var formData = new FormData(this); 
		  
		  $.ajax({
		    type: "POST",
		    url: "<?php echo site_url('Master/update_model'); ?>",
		    data: formData,
		    processData: false,
		    contentType: false,
		    dataType: "JSON", 
		    success: function(data) {
		      if(data.status=='success'){
		        swal(data.message, {icon: "success", timer: 1000, });
		        setTimeout(function(){
		          window.location = "<?php echo site_url('Master/model_add'); ?>"; 
		        },1000);
		      }else{ clkbtn.prop('disabled',false);
		        swal(data.message, {icon: "error", timer: 5000, });
		      }   
		    }, error: function (jqXHR, status, err){ clkbtn.prop('disabled',false);
		      swal("Some Problem Occurred!! please try again", { icon: "error", timer: 2000, });
		    }
		  });
		});	
	});
	$("#listing_tbl").on('click', '.delete-model', function() {
	  delete_row($(this), "<?php echo site_url('Master/delete_model'); ?>");
	});
</script>
<script>
function delete_row(clkbtn, dlt_link){ clkbtn.prop('disabled',true); 
  var dlt_id = clkbtn.data('value');

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {

        $.ajax({
          type: "POST",
          url: dlt_link,
          data: {delete_id:dlt_id},
          dataType: "JSON",
          success: function(data) { 
            if(data.status=='success'){
              swal(data.message, {icon: "success", timer: 1000, });
              setTimeout(function(){ 
              	window.location = "<?php echo site_url('Master/model_add'); ?>"; 
              },1000);
            }else{ clkbtn.prop('disabled',false);
              swal(data.message, {icon: "error", timer: 5000, });
            }  
          }, error: function (jqXHR, status, err) { clkbtn.prop('disabled',false);
            swal("Some Problem Occurred!! please try again", { icon: "error", timer: 2000, });
          }
        });
       
    } else { clkbtn.prop('disabled',false);
      swal("Your Data is safe!", { icon: "info", timer: 2000, });
    }
  });  
}
</script>