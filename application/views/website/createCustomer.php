
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
							<h3 class="card-title"><b>Customer Information Sheet</b></h3>
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

								<?php echo form_open('customer/create'); ?>
								<div class="row">
									<div class="col-lg-6">
										<label for="first_name">First Name</label>
										<input type="text" class="form-control" name="first_name"  required="true">
									</div>
									<div class="col-lg-6">
										<label>Middle Name</label>
										<input class="form-control" type="text" name="middle_name" required="true"/>
									</div>
								</div><br/>
								<div class="row">
									<div class="col-lg-6">
										<label>Last Name</label>
										<input class="form-control" type="text" name="last_name"  required="true"/>
									</div>
									<div class="col-lg-6">
										<label>Gender</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="gender" value="M"/><label class="form-check-label" style="margin-left: 5px;">Male</label> 
											<div style="margin-left: 5%; display: inline">
											<input class="form-check-input" type="radio" name="gender" value="F" /><label class="form-check-label" style="margin-left: 5px;">Female</label></div>
										</div>
									</div>
								</div><br/>
								
								
								
								<label>Present Address</label>
								<textarea class="form-control" name="present_address" rows="5" style="resize: none;"  required="true"></textarea><br/>
								<label>Permanent Address</label>
								<textarea class="form-control" name="permanent_address" rows="5" style="resize: none;"  required="true"></textarea><br/>
								<div class="row">
									<div class="col-lg-6">
										<label>Email Address</label>
										<input class="form-control" type="email" name="email" required="true"/>
									</div>
									<div class="col-lg-6">
										<label>Contact no.</label>
										<input class="form-control" type="text" name="contact_no"  required="true"/>
									</div>
								</div><br/>

								<div class="row">
									<div class="col-lg-6">
										<label>Date of Birth</label>
										<input class="form-control" type="date" name="birth_date" required="true" />
									</div>
									<div class="col-lg-6">
										<label>Place of Birth</label>
										<input class="form-control" type="text" name="birth_place" required="true" />
									</div>
								</div><br/>

								<div class="row">
									<div class="col-lg-6">
										<label>Nationality</label>
										<input class="form-control" type="text" name="nationality" required="true" />
									</div>
									<div class="col-lg-6">
										<label>Citizenship</label>
										<input class="form-control" type="text" name="citizenship" required="true" />
									</div>
								</div><br/>

								<div class="row">
									
									<div class="col-lg-4">
										<label>Employment Status</label>
										<select class="form-control"  name="employment_status">
											<option value="null">-- Choose below --</option>
											<option value="EMP">Employed</option>
											<option value="RET">Retired</option>
											<option value="SEL">Self-Employed</option>
											<option value="HWF">Housewife</option>
											<option value="OFW">Overseas Filipino Worker</option>
											<option value="STU">Student</option>
											<option value="OTH">Others</option>
										</select>

									</div>
									<div class="col-lg-4">

										<label>SSS No.</label>
										<input class="form-control" type="text" name="sss_no" required="true"/>
										<small>Please put N/A if it is not applicable to you.</small>
									</div>
									<div class="col-lg-4">
										<label>TIN No.</label>
										<input class="form-control" type="text" name="tin_no" required="true"/>
										<small>Please put N/A if it is not applicable to you.</small>
									</div>
								</div><br/>

								<div class="row">
									<div class="col-lg-6">
										<label>Nature of Employment</label>
										<select class="form-control"  name="nature_of_employment">
											<option value="null">-- Choose below --</option>
											<option value="ACT"> Accounting</option>
											<option value="COM"> Communication</option>
											<option value="EDU"> Education</option>
											<option value="ENG"> Engineering</option>
											<option value="FDI"> Food Industry</option>
											<option value="GOV"> Government</option>
											<option value="LEG"> Legal Practices</option>
											<option value="MED"> Medical Practices</option>
											<option value="MIL"> Military Practices</option>
											<option value="NGO"> Non-gov't Organization</option>
											<option value="OPS"> Other Professional Services</option>
											<option value="REL"> Real Estate</option>
											<option value="REO"> Religious Organization</option>
											<option value="SAN"> Sanitation Services</option>
											<option value="SHP"> Shipping or Maritime</option>
											<option value="TOU"> Tourism</option>
											<option value="TRN"> Transport</option>
											<option value="UTI"> Utilities</option>
											<option value="OTH"> Others</option>

										</select>
									</div>
									<div class="col-lg-6">
										<label>Main Source of Funds</label>
										<select class="form-control" name="source_of_funds">
											<option value="null">-- Choose below --</option>
											<option value="A"> Allowance</option>
											<option value="B"> Business</option>
											<option value="C"> Commission</option>
											<option value="D"> Donations/Contributions</option>
											<option value="F"> Campaign Funds</option>
											<option value="I"> Interest on Savings/Investments</option>
											<option value="P"> Pension</option>
											<option value="R"> Regular Remittances</option>
											<option value="S"> Salary</option>
											<option value="O"> Others</option>
										</select>
									</div>
								</div><br/>
								<div class="col-lg-2"><input class="btn btn-block btn-bg border-round" type="submit" value="Submit" /></div>

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

