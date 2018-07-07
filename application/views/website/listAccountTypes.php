
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Account Types</h1>
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

							<h5 class="card-title">
								<a href="<?php echo base_url() ?>account/type/create" class="btn border-round btn-info"> Create new Account Type</a> 
							</h5>
							<hr>
							<table id="account_table" class="table table-bordered">
								<thead>
									<tr >
										<td>Account Type</td>
										<td>Initial Deposit</td>
										<td>Interest Rate per annum</td>
										<td>Actions</td>
									</tr>
								</thead>
								
								<tr>
									<td>1234567890</td>
									<td>Savings</td>
									<td>Savings</td>
									<td>
										<a href="<?php echo base_url() ?>account/type/view/asasa" class="btn border-round btn-bg"> View</a> 
										<a href="<?php echo base_url() ?>account/type/edit/asasa" class="btn border-round btn-primary"> Edit</a> 
										<a href="<?php echo base_url() ?>account/type/delete" class="btn border-round btn-danger"> Delete</a>
									</td>
									
								</tr>
								
							</table>

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