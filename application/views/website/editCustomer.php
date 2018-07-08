
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
					<input type="text" class="form-control" name="first_name" value="<?= $first_name ?? null ?>">
				</div>
				<div class="col-lg-6">
					<label>Middle Name</label>
					<input class="form-control" type="text" name="middle_name" value="<?= $middle_name ?? null ?>"/>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-lg-6">
					<label>Last Name</label>
					<input class="form-control" type="text" name="last_name" value="<?= $last_name ?? null ?>"/>
				</div>
				<div class="col-lg-6">
					<label>Gender</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" value="M" <?= $gender=='M' ? 'checked="true"' : null ?> />
						<label class="form-check-label" style="margin-left: 5px;">Male</label> 

						<div style="margin-left: 5%; display: inline">
							<input class="form-check-input" type="radio" name="gender" value="F" <?= $gender=='F' ? 'checked="true"' : null ?>/>
							<label class="form-check-label" style="margin-left: 5px;">Female</label>
						</div>
					</div>
				</div>
			</div><br/>



			<label>Present Address</label>
			<textarea class="form-control" name="present_address" rows="5" style="resize: none;" value=""><?= $present_address ?? null ?></textarea><br/>
			<label>Permanent Address</label>
			<textarea class="form-control" name="permanent_address" rows="5" style="resize: none;" value=""><?= $permanent_address ?? null ?></textarea><br/>
			<div class="row">
				<div class="col-lg-6">
					<label>Email Address</label>
					<input class="form-control" type="email" name="email" value="<?= $email ?? null ?>"/>
				</div>
				<div class="col-lg-6">
					<label>Contact no.</label>
					<input class="form-control" type="text" name="contact_no" value="<?= $contact_no ?? null ?>"/>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Date of Birth</label>
					<input class="form-control" type="date" name="birth_date" value="<?= $birth_date ?? null ?>" />
				</div>
				<div class="col-lg-6">
					<label>Place of Birth</label>
					<input class="form-control" type="text" name="birth_place" value="<?= $birth_place ?? null ?>"/>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Nationality</label>
					<input class="form-control" type="text" name="nationality" value="<?= $nationality ?? null ?>"/>
				</div>
				<div class="col-lg-6">
					<label>Citizenship</label>
					<input class="form-control" type="text" name="citizenship" value="<?= $citizenship ?? null ?>"/>
				</div>
			</div><br/>

			<div class="row">

				<div class="col-lg-4">
					<label>Employment Status</label>
					<select class="form-control"  name="employment_status">
						<option value="null">-- Choose below --</option>
						<option value="EMP" <?= $employment_status == 'EMP'? "selected" : null ?> >Employed</option>
						<option value="RET" <?= $employment_status == 'RET'? "selected" : null ?> >Retired</option>
						<option value="SEL" <?= $employment_status == 'SEL'? "selected" : null ?> >Self-Employed</option>
						<option value="HWF" <?= $employment_status == 'HWF'? "selected" : null ?> >Housewife</option>
						<option value="OFW" <?= $employment_status == 'OFW'? "selected" : null ?> >Overseas Filipino Worker</option>
						<option value="STU" <?= $employment_status == 'STU'? "selected" : null ?> >Student</option>
						<option value="OTH" <?= $employment_status == 'OTH'? "selected" : null ?> >Others</option>
					</select>

				</div>
				<div class="col-lg-4">

					<label>SSS No.</label>
					<input class="form-control" type="text" name="sss_no" value="<?= $sss_no != 0 ? $sss_no: "N/A" ?? null ?>"/>
					<small>Please put N/A if it is not applicable to you.</small>
				</div>
				<div class="col-lg-4">
					<label>TIN No.</label>
					<input class="form-control" type="text" name="tin_no" value="<?= $sss_no != 0 ? $sss_no: "N/A" ?? null ?>"/>
					<small>Please put N/A if it is not applicable to you.</small>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Nature of Employment</label>
					<select class="form-control"  name="nature_of_employment">
						<option value="null">-- Choose below --</option>
						<option value="ACT" <?= $nature_of_employment == 'ACT'? "selected" : null ?>> Accounting</option>
						<option value="COM" <?= $nature_of_employment == 'COM'? "selected" : null ?>> Communication</option>
						<option value="EDU" <?= $nature_of_employment == 'EDU'? "selected" : null ?>> Education</option>
						<option value="ENG" <?= $nature_of_employment == 'ENG'? "selected" : null ?>> Engineering</option>
						<option value="FDI" <?= $nature_of_employment == 'FDI'? "selected" : null ?>> Food Industry</option>
						<option value="GOV" <?= $nature_of_employment == 'GOV'? "selected" : null ?>> Government</option>
						<option value="LEG" <?= $nature_of_employment == 'LEG'? "selected" : null ?>> Legal Practices</option>
						<option value="MED" <?= $nature_of_employment == 'MED'? "selected" : null ?>> Medical Practices</option>
						<option value="MIL" <?= $nature_of_employment == 'MIL'? "selected" : null ?>> Military Practices</option>
						<option value="NGO" <?= $nature_of_employment == 'NGO'? "selected" : null ?>> Non-gov't Organization</option>
						<option value="OPS" <?= $nature_of_employment == 'OPS'? "selected" : null ?>> Other Professional Services</option>
						<option value="REL" <?= $nature_of_employment == 'REL'? "selected" : null ?>> Real Estate</option>
						<option value="REO" <?= $nature_of_employment == 'REO'? "selected" : null ?>> Religious Organization</option>
						<option value="SAN" <?= $nature_of_employment == 'SAN'? "selected" : null ?>> Sanitation Services</option>
						<option value="SHP" <?= $nature_of_employment == 'SHP'? "selected" : null ?>> Shipping or Maritime</option>
						<option value="TOU" <?= $nature_of_employment == 'TOU'? "selected" : null ?>> Tourism</option>
						<option value="TRN" <?= $nature_of_employment == 'TRN'? "selected" : null ?>> Transport</option>
						<option value="UTI" <?= $nature_of_employment == 'UTI'? "selected" : null ?>> Utilities</option>
						<option value="OTH" <?= $nature_of_employment == 'OTH'? "selected" : null ?>> Others</option>

					</select>
				</div>
				<div class="col-lg-6">
					<label>Main Source of Funds</label>
					<select class="form-control" name="source_of_funds">
						<option value="null">-- Choose below --</option>
						<option value="A" <?= $source_of_funds == "A" ? "selected" : null ?> > Allowance</option>
						<option value="B" <?= $source_of_funds == "B" ? "selected" : null ?> > Business</option>
						<option value="C" <?= $source_of_funds == "C" ? "selected" : null ?> > Commission</option>
						<option value="D" <?= $source_of_funds == "D" ? "selected" : null ?> > Donations/Contributions</option>
						<option value="F" <?= $source_of_funds == "F" ? "selected" : null ?> > Campaign Funds</option>
						<option value="I" <?= $source_of_funds == "I" ? "selected" : null ?> > Interest on Savings/Investments</option>
						<option value="P" <?= $source_of_funds == "P" ? "selected" : null ?> > Pension</option>
						<option value="R" <?= $source_of_funds == "R" ? "selected" : null ?> > Regular Remittances</option>
						<option value="S" <?= $source_of_funds == "S" ? "selected" : null ?> > Salary</option>
						<option value="O" <?= $source_of_funds == "O" ? "selected" : null ?> > Others</option>
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

