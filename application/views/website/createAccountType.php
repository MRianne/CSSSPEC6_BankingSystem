
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
						<div class="card-body ">

							<h5 class="card-title">Create Account</h5>
							<hr>
							<div class="form-group">
								<?php echo validation_errors(); ?>
								<?php
								if ($this->session->flashdata('error_message') !== null) {
									echo "<span style=\"color: red;text-align: center; font-weight: bold\" id = \"result\" name = \"result\">
									<div>
									<p>".$this->session->flashdata('error_message')."</p>
									</div>
									</span>";
								}
								?>
								<?= $this->session->flashdata("message") ?? null ?>

								<?php echo form_open('account/type/create'); ?>
								<label>Description</label>
								<input class="form-control" type="text" name="description"/>
								<label>Initial Deposit</label>
								<input class="form-control" type="number" step="0.01" name="initial_deposit"/>
								<label>Required Minimum Monthly ADB</label>
								<input class="form-control" type="number" step="0.01" name="min_monthly_adb"/>
								<label>Required Minimum Daily Balance to Earn Interest</label>
								<input class="form-control" type="number" step="0.01" name="req_daily_bal"/>
								<label>Interest Rate per annum</label>
								<input class="form-control" type="number" step="0.01" name="interest_rate"/>
								<br>
								<div><input class="btn btn-primary" type="submit" value="Submit" /></div>

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