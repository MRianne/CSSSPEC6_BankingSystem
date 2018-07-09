
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
							<h3 class="card-title"><b>Edit Account Type</b></h3>
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

								<?php echo form_open('account/type/edit/'.$type_id); ?>

								<label>Account Type Name</label>
								<input class="form-control" type="text" name="description" value="<?= $description ?>"/> <br/>
								<div class="row">
									<div class="col-lg-6">
										<label>Initial Deposit</label>
										<input class="form-control" type="number" step="0.01" name="initial_deposit" value="<?= $initial_deposit ?>" />		
									</div>
									<div class="col-lg-6">
										<label>Required Minimum Monthly ADB</label>
										<input class="form-control" type="number" step="0.01" name="min_monthly_adb" value="<?= $min_monthly_adb ?>" />		
									</div>
								</div><br/>
								<div class="row">
									<div class="col-lg-6">
										<label>Required Minimum Daily Balance to Earn Interest</label>
										<input class="form-control" type="number" step="0.01" name="req_daily_bal" value="<?= $req_daily_bal ?>" />		
									</div>
									<div class="col-lg-6">
										<label>Interest Rate per annum</label>
										<input class="form-control" type="number" step="0.01" name="interest_rate" value="<?= $interest_rate ?>" />		
									</div>
								</div><br/>
								
								
								
							
						</div>
						<div class="card-footer">
							<a href="<?php echo base_url();?>account/type/view" class="btn border-round btn-danger pull-left">  Back to list</a>
							<input class="btn border-round btn-bg pull-right" type="submit" value="Save" />
							<button class="btn btn-warning border-round pull-right" type="reset"> Reset</button>
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