
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
								<form class="form-inline" method="POST" action="">
									<input class="form-control col-lg-9" type="text" name="account_id" placeholder="Enter account no.">
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

								<?php echo form_open('customer/search'); ?>
								<div class="row">
									<div class="col-lg-6">
										<label>Account Owner</label>
										<input class="form-control" type="text" disabled="true" value="<?= ($customer['person']['first_name'] ?? null) . ' ' . ($customer['person']['last_name'] ?? null)  ?>" />
										<input type="hidden" name="email" value="<?= $customer['email'] ?? null ?>" />
										<small><input class="btn btn-link btn-sm" type="<?= ($customer ?? null) == null ? "hidden" : "submit" ?>" value="Go to Customer Profile"></small>
									</div>
									<div class="col-lg-6">
										<label>Account ID</label>
										<input class="form-control" type="text" disabled="true" value="<?= $account['account_id'] ?? null ?>" /> <br/>
									</div>
								</div><br/>
								
								
								<div class="row">
									<div class="col-lg-6">
										<label>Account Type</label>
										<input class="form-control" type="text" value="<?= $account['account_type']['description'] ?? null ?>" disabled="true">
									</div>
									<div class="col-lg-6">
										<label>Balance</label>
										<input class="form-control" type="text" value="<?= number_format(($account['balance'] ?? null), 2) ?>" disabled="true" />		
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