
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

							<h5 class="card-title">Customer Information Sheet</h5>
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

								<?php echo form_open('customer/create'); ?>
								<label>First Name</label>
								<input class="form-control" type="text" name="first_name" placeholder="First name" />
								<label>Middle Name</label>
								<input class="form-control" type="text" name="middle_name" placeholder="Middle Name" />
								<label>Last Name</label>
								<input class="form-control" type="text" name="last_name" placeholder="Last Name" />
								<label>Gender</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" value="M"/><label class="form-check-label">Male</label><br/>
									<input class="form-check-input" type="radio" name="gender" value="F"/><label class="form-check-label">Female</label>
								</div>
								<label>Present Address</label>
								<textarea class="form-control" name="present_address" rows="5"></textarea>
								<label>Permanent Address</label>
								<textarea class="form-control" name="permanent_address" rows="5"></textarea>
								<label>Email Address</label>
								<input class="form-control" type="email" name="email"/>
								<label>Contact no.</label>
								<input class="form-control" type="text" name="contact_no"/>
								<label>Date of Birth</label>
								<input class="form-control" type="date" name="birth_date"/>
								<label>Place of Birth</label>
								<input class="form-control" type="text" name="birth_place"/>
								<label>Nationality</label>
								<input class="form-control" type="text" name="nationality"/>
								<label>Citizenship</label>
								<input class="form-control" type="text" name="citizenship"/>
								<label>SSS No.</label>
								<input class="form-control" type="text" name="sss_no"/>
								<label>TIN No.</label>
								<input class="form-control" type="text" name="tin_no"/>
								<label>Employment Status</label>
								<input class="form-control" type="text" name="employment_status"/>
								<label>Nature of Employment</label>
								<input class="form-control" type="text" name="nature_of_employment"/>
								<label>Source of Funds</label>
								<input class="form-control" type="text" name="source_of_funds"/>
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

