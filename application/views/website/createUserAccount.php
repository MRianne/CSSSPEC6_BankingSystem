
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
							<h3 class="card-title"><b>Create User</b></h3>
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
								if($this->session->flashdata('message' !== null)){
									echo '<div class="alert alert-success ">
									<h5><i class="icon fa fa-check"></i> Success!</h5>'.
									$this->session->flashdata('message')
									.'</div>';
								}
								?>

								<?php echo form_open('user/create'); ?>
								<div class="row">
									<div class="col-lg-4">
										<label for="first_name">First Name</label>
										<input type="text" class="form-control" name="first_name" >
									</div>
									<div class="col-lg-4">
										<label>Middle Name</label>
										<input class="form-control" type="text" name="middle_name"/>
									</div>
									<div class="col-lg-4">
										<label>Last Name</label>
										<input class="form-control" type="text" name="last_name" />
									</div>
								</div><br/>

								<div class="row">
									<div class="col-lg-6">
										<label>Username</label>
										<input class="form-control" type="text" name="username" placeholder="Username" />
									</div>
									<div class="col-lg-6">
										<label>Temporary Password</label><!-- or to be sent to email -->
										<input class="form-control" type="text" name="password" value="<?= $temporary_password ?>" readonly="true"/>
									</div>
								</div><br>

								<div class="row">
									<div class="col-lg-6">
										<label>Email address</label>
										<input class="form-control" type="email" name="email" placeholder="Email" />
									</div>
									<div class="col-lg-6">
										<label>Role</label>
										<select class="form-control" name="user_type">
											<?php if($role==='admin'): ?>
												<option value="admin">Admin</option>
												<option value="teller">Teller</option>
											<?php endif; ?>
											<option value="user">User</option>
										</select>
									</div>
								</div><br>
								<div><input class="btn btn-block border-round btn-bg col-lg-2" type="submit" value="Submit" /></div>
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

