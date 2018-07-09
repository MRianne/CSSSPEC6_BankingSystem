
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
										<td>Account Name</td>
										<td>Initial Deposit</td>
										<td>Interest Rate per annum</td>
										<td>Actions</td>
									</tr>
								</thead>
								<?php if($account_types)
									foreach ($account_types as $account_type): ?>
									<tr>
										<td><?= $account_type['description'] ?></td>
										<td><?= number_format($account_type['initial_deposit'], 2) ?></td>
										<td><?= $account_type['interest_rate'] ?></td>
										<td>
											<a href="<?php echo base_url() ?>account/type/view/<?= $account_type['type_id'] ?>" class="btn border-round btn-bg"> View</a> 
											<a href="<?php echo base_url() ?>account/type/edit/<?= $account_type['type_id'] ?>" class="btn border-round btn-primary"> Edit</a> 
											<a href="<?php echo base_url() ?>account/type/delete/<?= $account_type['type_id'] ?>" class="btn border-round btn-danger"> Delete</a>
										</td>
										
									</tr>
								<?php endforeach; ?>
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