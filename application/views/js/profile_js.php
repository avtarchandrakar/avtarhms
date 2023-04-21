<script type="text/javascript"> $(document).ready(function(e) {
//=========================Profile============================//

//=========================Profile==================admin=====//
$("form#frm-update-profile").submit(function(e) { e.preventDefault();
  var clkbtn = $("#btn-update-profile"); clkbtn.prop('disabled',true);

  var adminname = $("#aname").val();
  if(adminname==""){ alert("Please Enter Admin Name");
    $("#aname").focus(); $("#aname").addClass('input-error');

    clkbtn.prop('disabled',false); return false;
  }

  var adminemail = $("#aemail").val();
  if(adminemail==""){ alert("Please Entervalid Emailid");
    $("#aemail").focus(); $("#aemail").addClass('input-error');

    clkbtn.prop('disabled',false); return false;
  }

  var adminpassword = $("#apass").val();
  if(adminpassword==""){ alert("Please Enter Password");
    $("#apass").focus(); $("#apass").addClass('input-error');

    clkbtn.prop('disabled',false); return false;
  }

  var formData = new FormData(this);
  $.ajax({
    type: "POST",
    url: "<?php echo site_url('Profile/update_profile'); ?>",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON", 
    success: function(data) {
      if(data.status=='success'){
        swal(data.message, {icon: "success", timer: 1000, });
        setTimeout(function(){ window.location = "<?php echo site_url('Profile'); ?>"; },1000);
      }else{ clkbtn.prop('disabled',false);
        swal(data.message, {icon: "error", timer: 5000, });
      }  
    }, error: function (jqXHR, status, err) { clkbtn.prop('disabled',false);
      swal("Some Problem Occurred!! please try again",{ icon: "error", timer: 2000, });
    }
  });

});

$("form.frm-update-appdetails").submit(function(e) { e.preventDefault();
  var clkbtn = $(this).find("button.btn-update-appdetails"); clkbtn.prop('disabled',true);

  var formData = new FormData(this);
  $.ajax({
    type: "POST",
    url: "<?php echo site_url('Profile/update_app'); ?>",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON", 
    success: function(data) {
      if(data.status=='success'){
        swal(data.message, {icon: "success", timer: 2000, });
        // setTimeout(function(){ 
        //  // window.location = "<?php //echo site_url('Profile/app'); ?>"; 
        // },3000);
      }else{ clkbtn.prop('disabled',false);
        swal(data.message, {icon: "error", timer: 5000, });
      }  
    }, error: function (jqXHR, status, err) { clkbtn.prop('disabled',false);
      swal("Some Problem Occurred!! please try again",{ icon: "error", timer: 2000, });
    }
  });

});
//========================/Profile==================admin=====//

//========================/Profile============================//
}); </script>