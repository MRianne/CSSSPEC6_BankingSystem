
<div class="card">
	<div class="card-header">
		<b style="font-size: 2em">Customer Details</b>
		<a href="" class="btn btn-danger btn-sm float-right"> Delete</a>
		<a href="<?php echo base_url(); ?>account/create/meow" class="btn btn-bg btn-sm float-right"> Open Account</a>
		<a href="<?php echo base_url(); ?>user/create/" class="btn btn-warning btn-sm float-right"> Add User account</a>

		<a href="<?php echo base_url(); ?>customer/edit/??" class="btn btn-success btn-sm float-right"> Edit Details</a>
		
		
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

			<?php echo form_open('customer/edit'); ?>
			<div class="row">
				<div class="col-lg-6">
					<label for="first_name">First Name</label>
					<input type="text" class="form-control" name="first_name" value="">
				</div>
				<div class="col-lg-6">
					<label>Middle Name</label>
					<input class="form-control" type="text" name="middle_name" value=""/>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-lg-6">
					<label>Last Name</label>
					<input class="form-control" type="text" name="last_name" value=""/>
				</div>
				<div class="col-lg-6">
					<label>Gender</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" value="M" />
						<label class="form-check-label" style="margin-left: 5px;">Male</label> 

						<div style="margin-left: 5%; display: inline">
							<input class="form-check-input" type="radio" name="gender" value="F" />
							<label class="form-check-label" style="margin-left: 5px;">Female</label>
						</div>
					</div>
				</div>
			</div><br/>



			<label>Present Address</label>
			<textarea class="form-control" name="present_address" rows="5" style="resize: none;" value=""></textarea><br/>
			<label>Permanent Address</label>
			<textarea class="form-control" name="permanent_address" rows="5" style="resize: none;" value=""></textarea><br/>
			<div class="row">
				<div class="col-lg-6">
					<label>Email Address</label>
					<input class="form-control" type="email" name="email" value=""/>
				</div>
				<div class="col-lg-6">
					<label>Contact no.</label>
					<input class="form-control" type="text" name="contact_no" value=""/>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Date of Birth</label>
					<input class="form-control" type="date" name="birth_date" value="" />
				</div>
				<div class="col-lg-6">
					<label>Place of Birth</label>
					<input class="form-control" type="text" name="birth_place" value=""/>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Nationality</label>
					<input class="form-control" type="text" name="nationality" value=""/>
				</div>
				<div class="col-lg-6">
					<label>Citizenship</label>
					<input class="form-control" type="text" name="citizenship" value=""/>
				</div>
			</div><br/>

			<div class="row">

				<div class="col-lg-4">
					<label>Employment Status</label>
					<select class="form-control"  name="employment_status">
						<option value="null">-- Choose below --</option>
						<option value="EMP" selected="<?php //if() echo "true";?>">Employed</option>
						<option value="RET" selected="<?php //if() echo "true";?>">Retired</option>
						<option value="SEL" selected="<?php //if() echo "true";?>">Self-Employed</option>
						<option value="HWF" selected="<?php //if() echo "true";?>">Housewife</option>
						<option value="OFW" selected="<?php //if() echo "true";?>">Overseas Filipino Worker</option>
						<option value="STU" selected="<?php //if() echo "true";?>">Student</option>
						<option value="OTH" selected="<?php //if() echo "true";?>">Others</option>
					</select>

				</div>
				<div class="col-lg-4">

					<label>SSS No.</label>
					<input class="form-control" type="text" name="sss_no" value=""/>
					<small>Please put N/A if it is not applicable to you.</small>
				</div>
				<div class="col-lg-4">
					<label>TIN No.</label>
					<input class="form-control" type="text" name="tin_no" value=""/>
					<small>Please put N/A if it is not applicable to you.</small>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Nature of Employment</label>
					<select class="form-control"  name="nature_of_employment">
						<option value="null">-- Choose below --</option>
						<option value="ACT" selected="<?php //if() echo "true"; ?>"> Accounting</option>
						<option value="COM" selected="<?php //if() echo "true"; ?>"> Communication</option>
						<option value="EDU" selected="<?php //if() echo "true"; ?>"> Education</option>
						<option value="ENG" selected="<?php //if() echo "true"; ?>"> Engineering</option>
						<option value="FDI" selected="<?php //if() echo "true"; ?>"> Food Industry</option>
						<option value="GOV" selected="<?php //if() echo "true"; ?>"> Government</option>
						<option value="LEG" selected="<?php //if() echo "true"; ?>"> Legal Practices</option>
						<option value="MED" selected="<?php //if() echo "true"; ?>"> Medical Practices</option>
						<option value="MIL" selected="<?php //if() echo "true"; ?>"> Military Practices</option>
						<option value="NGO" selected="<?php //if() echo "true"; ?>"> Non-gov't Organization</option>
						<option value="OPS" selected="<?php //if() echo "true"; ?>"> Other Professional Services</option>
						<option value="REL" selected="<?php //if() echo "true"; ?>"> Real Estate</option>
						<option value="REO" selected="<?php //if() echo "true"; ?>"> Religious Organization</option>
						<option value="SAN" selected="<?php //if() echo "true"; ?>"> Sanitation Services</option>
						<option value="SHP" selected="<?php //if() echo "true"; ?>"> Shipping or Maritime</option>
						<option value="TOU" selected="<?php //if() echo "true"; ?>"> Tourism</option>
						<option value="TRN" selected="<?php //if() echo "true"; ?>"> Transport</option>
						<option value="UTI" selected="<?php //if() echo "true"; ?>"> Utilities</option>
						<option value="OTH" selected="<?php //if() echo "true"; ?>"> Others</option>

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
			<div class="row">
				<div class="col-lg-2"><input class="btn btn-block btn-bg border-round" type="submit" value="Save" /></div>
				<div class="col-lg-2"><input class="btn btn-block btn-danger border-round" type="reset" value="Reset" /></div>
			</div>



		</div>
	</div>
</div>

