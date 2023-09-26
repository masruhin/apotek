<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html class="fixed">

<head>
	<!-- Basic -->
	<meta charset="UTF-8">
	<title>Pharmacist</title>
	<meta name="author" content="Manigom">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/style.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.css" />
	<script src="<?php echo base_url() ?>assets/vendor/modernizr/modernizr.js"></script>
</head>

<body>
	<img class="wave" src="<?php echo base_url() ?>assets/images/wave.png">
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<div class="img">
				<img src="<?php echo base_url() ?>assets/images/bg.svg">
			</div>
			<h2 class="title">Selamat Datang!</h2>
			<div class="panel panel-sign">
				<div class="panel-body">
					<?php echo form_open('login/authlogin', ' id="Formulir" '); ?>

					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Masukan Email / Username</h5>
							<input name="username" type="text" class="input">
						</div>
					</div>

					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Masukan Password</h5>
							<input name="password" type="password" class="input">
						</div>
					</div>

					<!-- <div class="form-group mb-lg username">
								<label class="control-label">Masukan Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div> -->

					<!-- <div class="form-group mb-lg password">
								<label class="control-label">Masukan Password</label> 
								<div class="input-group input-group-icon ">
									<input name="password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div> -->

					<div class="row">
						<div class="col-sm-6">
						</div>
						<div class="col-sm-6 text-right">
							<button type="submit" class="btn btn-primary btn-block btn-lg" id="submitform">Login</button>
						</div>
					</div>

					</form>
				</div>
			</div>

		</div>
	</section>
	<!-- end: page -->

	<!-- Vendor -->
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<!-- <script src="<?php echo base_url() ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script> -->
	<!-- <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.js"></script> -->
	<!-- <script src="<?php echo base_url() ?>assets/vendor/nanoscroller/nanoscroller.js"></script> -->
	<!-- <script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
	<!-- <script src="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.js"></script> -->
	<!-- <script src="<?php echo base_url() ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>  -->
	<!-- <script src="<?php echo base_url() ?>assets/javascripts/theme.js"></script>   -->
	<script src="<?php echo base_url() ?>assets/vendor/pnotify/pnotify.custom.js"></script>
	<script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>
	<script type="text/javascript">
		const inputs = document.querySelectorAll(".input");

		function addcl() {
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl() {
			let parent = this.parentNode.parentNode;
			if (this.value == "") {
				parent.classList.remove("focus");
			}
		}


		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});
	</script>

	<script>
		document.getElementById("Formulir").addEventListener("submit", function(e) {
			blurForm();
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitform").setAttribute('disabled', 'disabled');
			$('#submitform').html('Loading ...');
			var form = $('#Formulir')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'json'
			}).done(function(data) {
				if (!data.success) {
					$('input[name=<?php echo $this->security->get_csrf_token_name(); ?>]').val(data.token);
					window.setTimeout(function() {
						document.getElementById("submitform").removeAttribute('disabled');
						$('#submitform').html('Login');
						var objek = Object.keys(data.errors);
						for (var key in data.errors) {
							if (data.errors.hasOwnProperty(key)) {
								var msg = '<div class="help-block" for="' + key + '">' + data.errors[key] + '</span>';
								$('.' + key).addClass('has-error');
								$('input[name="' + key + '"]').after(msg);
							}
						}
					}, 500);
					return false;
				} else {
					$('input[name=<?php echo $this->security->get_csrf_token_name(); ?>]').val(data.token);
					PNotify.removeAll();
					document.getElementById("submitform").removeAttribute('disabled');
					document.getElementById("Formulir").reset();
					$('#submitform').html('Login');
					new PNotify({
						title: 'Notifikasi',
						text: data.message,
						type: 'success'
					});
					window.location = '<?php echo base_url() ?>' + data.beranda;
				}
			}).fail(function(data) {
				document.getElementById("submitform").removeAttribute('disabled');
				$('#submitform').html('Login');
				new PNotify({
					title: 'Notifikasi',
					text: "Request gagal, browser akan direload",
					type: 'danger'
				});
				window.setTimeout(function() {
					location.reload();
				}, 2000);
			});
			e.preventDefault();
		});
	</script>


</body>

</html>