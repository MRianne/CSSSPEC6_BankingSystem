<body class="hold-transition login-bg">
	<div class="login-box">
		<?php
		if (isset($this->session->userdata['error_message'])) {
			echo "<span style=\"color: red;text-align: center; font-weight: bold\" id = \"result\" name = \"result\">
			<div>
			<p>".$this->session->userdata['error_message']."</p>
			</div>
			</span>";
		}
		?>
		<div class="login-logo">
			<br>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Welcome to the <b>Banking Website</b></p>

				<?php echo form_open('websitecontroller/submitLogin'); ?>
				<div class="form-group has-feedback">
					<input type="text" class="form-control border-round" id="username" name="username" placeholder="Username" autocomplete="off">
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control border-round" id="password" name="password" placeholder="Password">	
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat border-round btn-bg">SIGN IN</button>
					</div>
					<!-- /.col -->
				</div>
				<?php echo form_close(); ?>
			</div>
			<!-- /.login-card-body -->
		</div>
		
	</div>
	<!-- /.login-box -->

