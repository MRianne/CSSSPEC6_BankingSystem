
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

								<?php echo form_open('user/create'); ?>
								<label>First Name</label>
								<input class="form-control" type="text" name="first_name" placeholder="First name" />
								<label>Middle Name</label>
								<input class="form-control" type="text" name="middle_name" placeholder="Middle Name" />
								<label>Last Name</label>
								<input class="form-control" type="text" name="last_name" placeholder="Last Name" />
								<label>Username</label>
								<input class="form-control" type="text" name="username" placeholder="Username" />
								<label>Temporary Password</label><!-- or to be sent to email -->
								<input class="form-control" type="text" name="password" value="<?= $temporary_password ?>" readonly="true"/>
								<label>Email address</label>
								<input class="form-control" type="email" name="email" placeholder="Email" />
								<label>Role</label>
								<select class="form-control" name="user_type">
									<?php if($role==='admin'): ?>
									<option value="admin">Admin</option>
									<option value="teller">Teller</option>
									<?php endif; ?>
									<option value="user">User</option>
								</select>
								<br>
								<div><input class="btn btn-submit" type="submit" value="Submit" /></div>

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

