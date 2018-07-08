
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Transaction Details</h1>
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

							<h5 class="card-title">Account No: <?= $account_id?></h5>
							<hr>
							<table id="account_table" class="table table-bordered">
								
								<tr>
									<td class="cat"><b>Transaction ID</b></td>
									<td class="cat"><b>Description</b></td>
									<td class="cat"><b>DEBIT/CREDIT</b></td>
									<td class="cat"><b>Amount</b></td>
									<td class="cat"><b>Ending Balance</b></td>
									<td class="cat"><b>Date</b></td>
								</tr>
								<?php
									foreach ($transactions as $transaction):
								?>
									<tr>
										<td> <?= $transaction['transaction_id'] ?></td>
										<td> <?= $transaction['description'] ?></td>
										<td> <?= $transaction['type'] ?></td>
										<td> <?= number_format($transaction['amount'], 2) ?></td>
										<td> <?= number_format($transaction['balance'], 2) ?></td>
										<td> <?= $transaction['date'] ?></td>

									</tr>
								<?php endforeach; ?>
							</table>

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