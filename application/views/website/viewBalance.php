
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Account Balance</h1>
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

							<h5 class="card-title">Account Information</h5>
							<hr>
							<div class="form-group col-lg-6">
								<label for="accountNum">Account Number:</label>
								<input type="number" class="form-control" id="accountNum" placeholder="--- --- ---" disabled="true">
							</div>
							<div class="form-group col-lg-6">
								<label for="balance">Balance:</label>
								<input type="number" class="form-control" id="balance" placeholder="--- --- ---" disabled="true">
							</div>

						</div>
						<div class="card-footer">
							<a href="<?php echo base_url(); ?>user/profile" class="btn btn-bg border-btn btn-xs"> Back to Profile </a>
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