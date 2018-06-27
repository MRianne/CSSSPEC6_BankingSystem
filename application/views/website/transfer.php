
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Transfer Funds</h1>
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
						<div class="card-body ">

							<h5 class="card-title">Please input the following details.</h5>
							<hr>

							<?php echo form_open('websiteController/transferFunds'); ?>
							<div class="form-group col-lg-6">
								<label for="accountNum">Your Account Number:</label>
								<input type="text" class="form-control" id="accountNum" placeholder="--- --- ---">
							</div>
							<div class="form-group col-lg-6">
								<label for="receiver">Account Number of Receiver:</label>
								<input type="text" class="form-control" id="receiver" placeholder="--- --- ---">
							</div>
							<div class="form-group col-lg-6">
								<label for="amount">Amount:</label>
								<input type="text" class="form-control" id="amount">
							</div>
							<div class="form-group col-lg-6">
								<label for="pin">Pin:</label>
								<input type="password" class="form-control" id="pin" placeholder="----">
							</div>
							<button type="submit" class="btn btn-primary btn-block btn-flat border-round btn-bg col-lg-2">Submit</button>
							<?php form_close(); ?>
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
