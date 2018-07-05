
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Search Account</h1>
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
							<div class="row">
								<form class="form-inline">
									<input class="form-control col-lg-9" type="text" name="account_no" placeholder="Enter account no.">
									<button class="btn btn-rounded btn-bg col-lg-3"  type="submit" > Search</button>
								</form>
							</div>
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

								<?php echo form_open('account/type/create'); ?>
								<div class="row">
									<div class="col-lg-6">
										<label>Account Owner</label>
										<input class="form-control" type="text" name="customer" disabled="true" value="" />
										<small><a href="">Go to Customer Profile</a></small>
									</div>
									<div class="col-lg-6">
										<label>Account ID</label>
										<input class="form-control" type="text" name="accountID" disabled="true" value="" /> <br/>
									</div>
								</div><br/>
								
								
								<div class="row">
									<div class="col-lg-6">
										<label>Account Type</label>
										<select class="form-control"  name="account_type" disabled="true">
											<option value="null">-- Choose below --</option>
											<option value="" selected="<?php //if() echo "true"; ?>"> </option>
										</select>
									</div>
									<div class="col-lg-6">
										<label>Balance</label>
										<input class="form-control" type="number" step="0.01" name="min_monthly_adb" disabled="true" />		
									</div>
								</div><br/>
								<div class="row">
									<div class="col-lg-6">
									
									</div>
									<div class="col-lg-6">
										
									</div>
								</div><br/>
							</form>
						</div>
					</div>
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