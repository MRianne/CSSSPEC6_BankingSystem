
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
							<h3 class="card-title"><b>Account Type</b></h3>
						</div>
						<div class="card-body ">
							<div class="form-group">
								<label>Account Type Name</label>
								<input class="form-control" type="text" name="description" value="<?= $description ?>" disabled="true" /> <br/>
								<div class="row">
									<div class="col-lg-6">
										<label>Initial Deposit</label>
										<input class="form-control" type="text" name="initial_deposit" value="<?= number_format($initial_deposit, 2) ?>" disabled="true" />		
									</div>
									<div class="col-lg-6">
										<label>Required Minimum Monthly ADB</label>
										<input class="form-control" type="text" name="min_monthly_adb" value="<?= number_format($min_monthly_adb, 2) ?>" disabled="true" />		
									</div>
								</div><br/>
								<div class="row">
									<div class="col-lg-6">
										<label>Required Minimum Daily Balance to Earn Interest</label>
										<input class="form-control" type="text" name="req_daily_bal" value="<?= number_format($req_daily_bal, 2) ?>" disabled="true" />		
									</div>
									<div class="col-lg-6">
										<label>Interest Rate per annum</label>
										<input class="form-control" type="text"  name="interest_rate" value="<?= number_format($interest_rate, 2) ?>" disabled="true" />		
									</div>
								</div><br/>
								
								
								
							
						</div>
						<div class="card-footer">
							<a href="<?php echo base_url();?>account/type/view" class="btn border-round btn-danger pull-left">  Back to list</a>
						</div>
						</form>
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