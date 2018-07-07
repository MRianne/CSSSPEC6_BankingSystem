
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Hello, First!</h1>
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

							<h5 class="card-title">User Details</h5>
							<hr>
							<table id="account_table" class="table table-bordered">
								<tr>
									<td colspan="3" class="table_head"><b>Account Information</b></td>
								</tr>
								<tr>
									<td class="cat" colspan="2"><b>Number of accounts: </b></td>
									<td>2</td>
								</tr>	
								<tr>
									<td class="cat"><b>Account Number</b></td>
									<td class="cat"><b>Account Type</b></td>
									<!-- <td class="cat"><b>Account Type</b></td> -->
									<td class="cat"><b>Actions</b></td>
								</tr>
								<tr>
									<td>1234567890</td>
									<td>Savings</td>
									<!-- <td> balance here </td> -->
									<td>
										<a href="<?php echo base_url() ?>account/viewBalance" class="btn border-round btn-bg" > View Balance</a> 
										<a href="<?php echo base_url() ?>account/viewTransactionHist" class="btn border-round btn-primary	" > View Transaction History</a>
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