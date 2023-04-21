<script>
	function searchJob() {

		var search_job_no = $("#search_job_no").val();

		if (search_job_no == '') {

			alert("Please Enter Job No.");

		} else {

			$.ajax({

				type: "post",

				url: '<?php echo base_url("Welcome/get_jobs"); ?>',

				dataType: 'json',

				data: {
					search_job_no: search_job_no
				},

				success: function(data) {

					if (data.status == 1) {

						window.location.href = "<?php echo base_url('Jobs/details?id='); ?>" + data.job_id;

					} else {

						alert('Invalid Job No. Please try again!');

					}

				}

			});

		}

	}







	$(document).ready(function(e) {
		$('.seat-maintance').on("click", function() {
			var seat = $(this).data('seat');
			var room = $(this).data('room');
			var branch = $(this).data('branch');
			$('#btn-maintance').hide();
			$('#btn-available').show();
			$('#btn-available').attr('data-seat2', seat);
			$('#btn-available').attr('data-room2', room);
			$('#btn-available').attr('data-branch2', branch);
			$('#modalheader2').html("Seat " + seat + " ,Room " + room);
			$("#ButtonModal").modal("show");

		});

		$('.seat-avilable').on("click", function() {
			var seat = "";
			var room = "";
			var branch = "";
			seat = $(this).data('seat');
			room = $(this).data('room');
			branch = $(this).data('branch');
			$('#btn-maintance').show();
			$('#btn-available').hide();
			$('#btn-maintance').attr('data-seat1', seat);
			$('#btn-maintance').attr('data-room1', room);
			$('#btn-maintance').attr('data-branch1', branch);
			$('#modalheader2').html("Seat " + seat + " ,Room " + room);
			$("#ButtonModal").modal("show");

		});

		$(".seat-booked").on("click", function() {
			var seat = $(this).data('seat');
			var room = $(this).data('room');
			var branch = $(this).data('branch');

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Booking/get_booking_details'); ?>",
				data: {
					seat: seat,
					room: room,
					branch: branch
				},
				dataType: "JSON",
				success: function(data) {
					if (data.status == 'success') {
						$('#modalheader').html("Seat " + seat + " ,Room " + room);
						$('#modalname').html(data.data.m_student_name);
						$('#modalcontact').html(data.data.m_student_mobile);
						$('#modalemail').html(data.data.m_student_email);
						$('#modalBd').html(data.data.m_booking_added_on);
						$('#modalEd').html(data.data.m_booking_end);
						$('#modalPlan').html(data.data.m_plan_name);
						$('#modalprice').html(data.data.m_booking_price);
						$('#modalBno').html(data.data.m_booking_no);
						$("#modalimg").attr("src", "<?= base_url('uploads/student/') ?>" + data.data.m_student_image);
						$("#vecant_btn").attr('data-user', data.data.m_student_id);
						$("#vecant_btn").attr('data-booking', data.data.m_booking_id);
						$("#BookingModal").modal("show");
					} else {
						clkbtn.prop('disabled', false);
						swal(data.message, {
							icon: "error",
							timer: 5000,
						});
					}
				}
			});
		});

		$('#vecant_btn').on("click", function() {
			user = $(this).data('user');
			booking = $(this).data('booking');

			swal({
				title: "Are you sure?",
				text: "Once Changed, you will not be able to recover this data!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {

					$.ajax({
						type: "POST",
						url: "<?php echo site_url('Booking/mark_booked_seat_available'); ?>",
						data: {
							user: user,
							booking: booking,
							
						},
						dataType: "JSON",
						success: function(data) {
							swal("Status Update Successfully", {
								icon: "success",
								timer: 1000,
							});
							location.reload();
						}
					});

				} else {
					clkbtn.prop('disabled', false);
					swal("Your Data is safe!", {
						icon: "info",
						timer: 2000,
					});
				}
			});



		});


		$('#btn-maintance').on("click", function() {
			var seat1 = "";
			var room1 = "";
			var branch1 = "";
			seat1 = $(this).data('seat1');
			room1 = $(this).data('room1');
			branch1 = $(this).data('branch1');
			status = 2;

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Booking/update_seat_status'); ?>",
				data: {
					seat: seat1,
					room: room1,
					branch: branch1,
					status: status,
				},
				dataType: "JSON",
				success: function(data) {
					swal("Status Update Successfully", {
						icon: "success",
						timer: 1000,
					});
					location.reload();
				}
			});

		});

		$('#btn-available').on("click", function() {
			var seat2 = "";
			var room2 = "";
			var branch2 = "";
			seat2 = $(this).data('seat2');
			room2 = $(this).data('room2');
			branch2 = $(this).data('branch2');
			status = 0;

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Booking/update_seat_status'); ?>",
				data: {
					seat: seat2,
					room: room2,
					branch: branch2,
					status: status,
				},
				dataType: "JSON",
				success: function(data) {
					swal("Status Update Successfully", {
						icon: "success",
						timer: 1000,
					});
					location.reload();
				}
			});

		});

	});
</script>