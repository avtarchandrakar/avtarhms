<!-- ========================Header==============Fix========= -->
<?php $this->view('top_header') ?>
<!-- =======================/Header==============Fix========= -->

<!-- Right Side Content Start -->
<style>
    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .txt_left {
        float: left;
    }

    .txt-right {
        float: right;
    }

    .txt-word {
        word-break: break-word;
    }

    .font-15 {
        font-size: 15px !important;
        padding: 10px;
    }

    .wt-42 {
        width: 42%;
    }

    .badge {
        background-color: #2d1b4f !important;
        cursor: pointer;
    }

    .modal-content {
        text-align: left !important;
    }

    .p-0 {
        padding: 12px !important;
    }

    .img-set {
        width: 100%;
        height: 200px;
        border: 1px solid black;
        border-radius: 2%;
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
                        <div class="col-md-4  col-sm-4">
                            <div class="seipkon-breadcromb-left">
                                <h3><?php echo $pagename; ?></h3>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8 pull-right">
                            <div class="seipkon-breadcromb-right">

                                <a href="<?php echo base_url('Students/add_student?id=') . $edit_value[0]->m_student_id; ?>" class="btn btn-info btn-vsm" title="Edit"><i class="fa fa-edit"></i> Edit</a>

                                <a style="margin-right: 5px;" href="<?php echo site_url('Students/student_list') ?>" class="btn btn-info btn-vsm"><i class="fa fa-long-arrow-left"></i> Back</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <br>
        <!------------------for img---------------------------->
        <?php

        if (!empty($edit_value[0]->m_student_image)) {
            $student_img = base_url('uploads/student/') . $edit_value[0]->m_student_image;
        } else {
            $student_img = base_url('uploads/Category/defaultimg.jpg');
        }

        ?>
        <!------------------for img End Above------------------>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $student_img; ?>" alt="Profile Photo" class="rounded-circle" style="width:160px; margin-bottom:20px;">
                            <h4 style="font-size: 25px;"><?php echo  $edit_value[0]->m_student_name; ?></h4>
                            <!-------------------------------------------------------->

                        </div>
                    </div>
                </div>
                <div class="card font-15">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center">
                            <table class="table table-bordered">
                                <tr>
                                    <td><i class="fa fa-phone-square"></i> Cont. No.</td>
                                    <td><b><?php echo $edit_value[0]->m_student_mobile; ?></b></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-envelope"></i> Email ID</td>
                                    <td><b class="txt-word"><?php echo $edit_value[0]->m_student_email; ?></b></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-calendar-o"></i> DOB</td>
                                    <td><b class="txt-word"><?php if ($edit_value[0]->m_student_dob != '0000-00-00') echo date('d-m-Y', strtotime($edit_value[0]->m_student_dob));
                                                            else echo ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td class="wt-42"><i class="fa fa-map-globe"></i> State</td>
                                    <td><b><?php echo $edit_value[0]->m_state_name; ?></b></td>
                                </tr>
                                <tr>
                                    <td class="wt-42"><i class="fa fa-map-marker"></i> City</td>
                                    <td><b><?php echo $edit_value[0]->m_city_name; ?></b></td>
                                </tr>
                                <tr>
                                    <td class="wt-42"><i class="fa fa-clock-o"></i> Status </td>
                                    <td><b><?php if ($edit_value[0]->m_student_status == 1) echo "Active";
                                            else {
                                                echo "InActive";
                                            } ?></b></td>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="card font-15">
                    <div class="card-body">
                        <h4>Profile Details</h4>
                        <br>
                        <table class="table table-bordered">
                            <?php
                            $original_date = $edit_value[0]->m_student_added_on;
                            $new_date = date("d-m-Y", strtotime($original_date));

                            ?>
                            <tr>
                                <td>Joined On:</td>
                                <td><b><?php echo $new_date; ?></b></td>
                            </tr>
                            <tr>
                                <td>DOB:</td>
                                <td><b><?php if ($edit_value[0]->m_student_dob != '0000-00-00') echo date('d-m-Y', strtotime($edit_value[0]->m_student_dob));
                                        else echo ''; ?></b></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td><b><?php echo $edit_value[0]->m_student_gender; ?></b></td>
                            </tr>

                            <tr>
                                <td>Address:</td>
                                <td><b><?php echo $edit_value[0]->m_student_address; ?></b></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="card font-15">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Authentication</h4>
                            </div>
                            <div class="col-md-6 pull-right">
                                <?php if($edit_value[0]->m_student_aadhar_verified == 1){
                                    echo '<button type="button" id="btn-aadharverify" data-id="'.$edit_value[0]->m_student_id .'" data-value = "0" class="btn btn-success pull-right"> Verified </button>';
                                 }
                                else {
                                    echo '<button type="button" id="btn-aadharverify" data-id="'.$edit_value[0]->m_student_id .'" data-value = "1" class="btn btn-danger pull-right"> Un-Verified </button>';
                                }?>
                            
                            </div>
                        </div>
                        <br>

                        <table class="table table-bordered">
                            <tr>
                                <td>Aadhaar Card No:</td>
                                <td><b><?php echo $edit_value[0]->m_student_adhar_no; ?></b></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label>Aadhaar Front</label>
                                <hr>
                                <?php
                                if (!empty($edit_value[0]->m_student_adhar_f)) {
                                ?>
                                    <a href="<?php echo base_url('uploads/student/') . $edit_value[0]->m_student_adhar_f; ?>" target="_blank"><img class="img-set" src="<?php echo base_url('uploads/student/') . $edit_value[0]->m_student_adhar_f; ?>" alt="Aadhaar Front"></a>
                                <?php
                                } else {
                                ?>
                                    <img class="img-set" src="<?php echo base_url('uploads/icon/no-pictures.png'); ?>" alt="Aadhaar Front">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label>Aadhaar Back</label>
                                <hr>
                                <?php
                                if (!empty($edit_value[0]->m_student_adhar_b)) {
                                ?>
                                    <a href="<?php echo base_url('uploads/student/') . $edit_value[0]->m_student_adhar_b; ?>"><img class="img-set" src="<?php echo base_url('uploads/student/') . $edit_value[0]->m_student_adhar_b; ?>" alt="Aadhaar Back"></a>
                                <?php
                                } else {
                                ?>
                                    <img class="img-set" src="<?php echo base_url('uploads/icon/no-pictures.png'); ?>" alt="Aadhaar Back">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card font-15">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4>Membership Plan Details</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <button data-toggle="modal" class="btn btn-info btn-vsm" data-target="#myModal" title="Edit"><i class="fa fa-edit"></i> Update Plan</button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Update Plan</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <?php
                                                    if (!empty($get_all_plan)) {
                                                        foreach ($get_all_plan as $plan) {
                                                    ?>
                                                            <div class="col-md-6 col-lg-4">
                                                                <!-- Pricing Card -->
                                                                <div class="pricing-card animate-up-3">
                                                                    <div class="card shadow-sm border-primary p-0">
                                                                        <!-- Header -->
                                                                        <header class="card-header">
                                                                            <h2 class="h5 text-primary mb-3"><?php echo $plan->m_plan_name; ?></h2>
                                                                            <span class="d-block">
                                                                                <span class="display-1 text-primary font-weight-bold">
                                                                                    <span class="align-top font-medium"><i class="fa fa-inr"></i></span><?php echo $plan->m_plan_price; ?>
                                                                                </span>
                                                                                <span class="d-block text-light font-small">/ <?php echo $plan->m_plan_name; ?></span>
                                                                            </span>
                                                                        </header>
                                                                        <form id="frm-updateplan">
                                                                            <input type="hidden" name="planid" value="<?= $plan->m_plan_id ?>">
                                                                            <input type="hidden" name="studentid" value="<?= $edit_value[0]->m_student_id ?>">

                                                                            <div class="card-body p-0">
                                                                                <button type="submit" id="btn-updateplan" class="btn btn-primary btn-block rounded-0" tabindex="0">Add</button>
                                                                            </div>
                                                                        </form>
                                                                        <!-- End Content -->
                                                                    </div>
                                                                </div>
                                                                <!-- End of Pricing Card -->
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <td>Plan Name:</td>
                                <td><b><?php echo $get_a_student[0]->m_plan_name; ?></b></td>
                            </tr>

                            <tr>
                                <td>Active/Expired:</td>
                                <td><b>
                                        <?php
                                        if ($get_a_student[0]->m_student_end_date > date('Y-m-d')) {
                                            echo "<span class='text-success'>Active</span>";
                                        } else {
                                            echo "<span class='text-danger'>Expired</span>";
                                        }
                                        ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td>Start Date:</td>
                                <td><b><?php if ($get_a_student[0]->m_student_start_date != '0000-00-00') echo date('d-m-Y', strtotime($get_a_student[0]->m_student_start_date));
                                        else '-'; ?></b></td>
                            </tr>
                            <tr>
                                <td>End Date:</td>
                                <td><b><?php if ($get_a_student[0]->m_student_end_date != '0000-00-00') echo date('d-m-Y', strtotime($get_a_student[0]->m_student_end_date));
                                        else '-'; ?></b></td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================/View=================Fix======= -->
<!-- ========================Footer================Fix======= -->
<?php $this->view('top_footer'); ?>
<!-- =======================/Footer================Fix======= -->

<script>
    $(document).ready(function(e) {

        $("form#frm-updateplan").submit(function(e) {
            e.preventDefault();
            var clkbtn = $("#btn-updateplan");
            clkbtn.prop('disabled', true);
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Booking/update_membershipplan'); ?>",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.status == 'success') {
                        swal(data.message, {
                            icon: "success",
                            timer: 1000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        clkbtn.prop('disabled', false);
                        swal(data.message, {
                            icon: "error",
                            timer: 5000,
                        });
                    }
                },
                error: function(jqXHR, status, err) {
                    clkbtn.prop('disabled', false);
                    swal("Some Problem Occurred!! please try again", {
                        icon: "error",
                        timer: 2000,
                    });
                }
            });

        });


        $("#btn-aadharverify").on("click", function() {
var student_id = $(this).data('id');
var value = $(this).data('value');

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Students/update_verification'); ?>",
                data:{student_id:student_id,value:value},

                dataType: "JSON",
                success: function(data) {
                    if (data.status == 'success') {
                        swal(data.message, {
                            icon: "success",
                            timer: 1000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                }
            });

        });

    });
</script>