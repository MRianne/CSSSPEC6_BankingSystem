
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Search Customer</h1>
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
									<input class="form-control col-lg-9" type="text" name="customer_name" placeholder="Enter customer name">
									<button class="btn btn-rounded btn-bg col-lg-3"  type="submit" > Search</button>
								</form>
							</div>
						</div>
					</div>
					<div class="card" style="display: <?php //if( walang results) echo none; ?>">
						<div class="card-body">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>Last Name</th>
										<th>First Name</th>
										<th style="width: 40%">Actions</th>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td>
											<a href="<?php echo base_url(); ?>account/create/meow" class="btn btn-bg btn-sm"> Open Account</a>
											<a href="<?php echo base_url(); ?>user/create/" class="btn btn-bg btn-sm"> Add User account</a>
											
											<a href="<?php echo base_url(); ?>customer/edit/??" class="btn btn-primary btn-sm"> View Details</a>
											<a href="" class="btn btn-danger btn-sm"> Delete</a>
										</td>
									</tr>
								</tbody></table>
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