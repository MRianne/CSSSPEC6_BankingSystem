
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"></h1>
				</div><!-- /.col -->

			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><b>Create Account Type</b></h3>
						</div>
						<div class="card-body ">
							<div class="form-group">
								<?php echo validation_errors(); ?>
								<?php
								if ($this->session->flashdata('error_message') !== null) {
									echo '<div class="alert alert-danger ">
									<h5><i class="icon fa fa-ban"></i> Error!</h5>'.
									$this->session->flashdata('error_message')
									.'</div>';
								}
								if($this->session->flashdata('message') !== null){
									echo '<div class="alert alert-success ">
									<h5><i class="icon fa fa-check"></i> Success!</h5>'.
									$this->session->flashdata('message')
									.'</div>';
								}
								?>

								<?php echo form_open(''); ?>

								<div class="col-lg-6 form-group">
									<label>Old Password</label>
									<input class="form-control" type="password"  name="oldPassword"/>		
								</div>
								<div class="col-lg-6">
									<label>New Password</label>
									<input class="form-control" type="password"  name="password"/>		
								</div>
								<div class="col-lg-6">
									<label>Verify Password</label>
									<input class="form-control" type="password"  name="passconf"/>		
								</div>

							</div>
						</div>
						<div class="card-footer">
							<button class="btn  border-round btn-bg" type="submit"> Submit </button>
							<button class="btn btn-danger border-round" type="reset"> Reset</button>
						</div>
					</form>
					</div>

				</div>

			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		Lodi Group
	</div>
	<!-- Default to the left -->
	<strong>SQ is life. </strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->