
	<!-- Main content -->
	<div class="card-header">
		<b style="font-size: 2em">Customer Details</b>
		<?php if(isset($customer_id)): ?>
			<a href="<?php echo base_url(); ?>customer/delete/<?= $customer_id ?? null ?>" class="btn btn-danger btn-sm float-right"> Delete</a>
			<a href="<?php echo base_url(); ?>account/create/<?= $customer_id ?? null ?>" class="btn btn-bg btn-sm float-right"> Open Account</a>
			<a href="<?php echo base_url(); ?>user/customer/create/<?= $person_id ?? null ?>" class="btn btn-warning btn-sm float-right"> Add User account</a>
		<?php endif; ?>

		<!-- <a href="<?php echo base_url(); ?>customer/edit/??" class="btn btn-success btn-sm float-right"> Edit Details</a> -->
		
		
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
			if($this->session->flashdata('message') !== null){
				echo '<div class="alert alert-success ">
				<h5><i class="icon fa fa-check"></i> Success!</h5>'.
				$this->session->flashdata('message')
				.'</div>';
			}
			?>

			<?php echo form_open('customer/edit/' . ($customer_id ?? null)); ?>
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
						<input class="form-check-input" type="radio" name="gender" value="M" <?= ($gender ?? null) =='M' ? 'checked="true"' : null ?> />
						<label class="form-check-label" style="margin-left: 5px;">Male</label> 

						<div style="margin-left: 5%; display: inline">
							<input class="form-check-input" type="radio" name="gender" value="F" <?= ($gender ?? null) =='F' ? 'checked="true"' : null ?>/>
							<label class="form-check-label" style="margin-left: 5px;">Female</label>
						</div>
					</div>
				</div>
			</div><br/>

			<label>Present Address</label>
			<textarea class="form-control" name="present_address" rows="5" style="resize: none;"><?= $present_address ?? null ?></textarea><br/>
			<label>Permanent Address</label>
			<textarea class="form-control" name="permanent_address" rows="5" style="resize: none;"><?= $permanent_address ?? null ?></textarea><br/>
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
						<option value="EMP" <?= ($employment_status ?? null)  == 'EMP'? "selected" : null ?> >Employed</option>
						<option value="RET" <?= ($employment_status ?? null)  == 'RET'? "selected" : null ?> >Retired</option>
						<option value="SEL" <?= ($employment_status ?? null)  == 'SEL'? "selected" : null ?> >Self-Employed</option>
						<option value="HWF" <?= ($employment_status ?? null)  == 'HWF'? "selected" : null ?> >Housewife</option>
						<option value="OFW" <?= ($employment_status ?? null)  == 'OFW'? "selected" : null ?> >Overseas Filipino Worker</option>
						<option value="STU" <?= ($employment_status ?? null)  == 'STU'? "selected" : null ?> >Student</option>
						<option value="OTH" <?= ($employment_status ?? null)  == 'OTH'? "selected" : null ?> >Others</option>
					</select>

				</div>
				<div class="col-lg-4">
					<label>SSS No.</label>
					<input class="form-control" type="text" name="sss_no" value="<?= ($sss_no ?? null) == 0 ? "N/A" : $sss_no ?? null ?>"/>
					<small>Please put N/A if it is not applicable to you.</small>
				</div>
				<div class="col-lg-4">
					<label>TIN No.</label>
					<input class="form-control" type="text" name="tin_no" value="<?= ($tin_no ?? null) == 0 ? "N/A" : $tin_no ?? null ?>"/>
					<small>Please put N/A if it is not applicable to you.</small>
				</div>
			</div><br/>

			<div class="row">
				<div class="col-lg-6">
					<label>Nature of Employment</label>
					<select class="form-control"  name="nature_of_employment">
						<option value="null">-- Choose below --</option>
						<option value="ACT" <?= ($nature_of_employment ?? null)  == 'ACT'? "selected" : null ?>> Accounting</option>
						<option value="COM" <?= ($nature_of_employment ?? null)  == 'COM'? "selected" : null ?>> Communication</option>
						<option value="EDU" <?= ($nature_of_employment ?? null)  == 'EDU'? "selected" : null ?>> Education</option>
						<option value="ENG" <?= ($nature_of_employment ?? null)  == 'ENG'? "selected" : null ?>> Engineering</option>
						<option value="FDI" <?= ($nature_of_employment ?? null)  == 'FDI'? "selected" : null ?>> Food Industry</option>
						<option value="GOV" <?= ($nature_of_employment ?? null)  == 'GOV'? "selected" : null ?>> Government</option>
						<option value="LEG" <?= ($nature_of_employment ?? null)  == 'LEG'? "selected" : null ?>> Legal Practices</option>
						<option value="MED" <?= ($nature_of_employment ?? null)  == 'MED'? "selected" : null ?>> Medical Practices</option>
						<option value="MIL" <?= ($nature_of_employment ?? null)  == 'MIL'? "selected" : null ?>> Military Practices</option>
						<option value="NGO" <?= ($nature_of_employment ?? null)  == 'NGO'? "selected" : null ?>> Non-gov't Organization</option>
						<option value="OPS" <?= ($nature_of_employment ?? null)  == 'OPS'? "selected" : null ?>> Other Professional Services ?? null </option>
						<option value="REL" <?= ($nature_of_employment ?? null)  == 'REL'? "selected" : null ?>> Real Estate</option>
						<option value="REO" <?= ($nature_of_employment ?? null)  == 'REO'? "selected" : null ?>> Religious Organization</option>
						<option value="SAN" <?= ($nature_of_employment ?? null)  == 'SAN'? "selected" : null ?>> Sanitation Services</option>
						<option value="SHP" <?= ($nature_of_employment ?? null)  == 'SHP'? "selected" : null ?>> Shipping or Maritime</option>
						<option value="TOU" <?= ($nature_of_employment ?? null)  == 'TOU'? "selected" : null ?>> Tourism</option>
						<option value="TRN" <?= ($nature_of_employment ?? null)  == 'TRN'? "selected" : null ?>> Transport</option>
						<option value="UTI" <?= ($nature_of_employment ?? null)  == 'UTI'? "selected" : null ?>> Utilities</option>
						<option value="OTH" <?= ($nature_of_employment ?? null)  == 'OTH'? "selected" : null ?>> Others</option>

					</select>
				</div>
				<div class="col-lg-6">
					<label>Main Source of Funds</label>
					<select class="form-control" name="source_of_funds">
						<option value="null">-- Choose below --</option>
						<option value="A" <?= ($source_of_funds ?? null)  == "A" ? "selected" : null ?> > Allowance</option>
						<option value="B" <?= ($source_of_funds ?? null)  == "B" ? "selected" : null ?> > Business</option>
						<option value="C" <?= ($source_of_funds ?? null)  == "C" ? "selected" : null ?> > Commission</option>
						<option value="D" <?= ($source_of_funds ?? null)  == "D" ? "selected" : null ?> > Donations/Contributions</option>
						<option value="F" <?= ($source_of_funds ?? null)  == "F" ? "selected" : null ?> > Campaign Funds</option>
						<option value="I" <?= ($source_of_funds ?? null)  == "I" ? "selected" : null ?> > Interest on Savings/Investments</option>
						<option value="P" <?= ($source_of_funds ?? null)  == "P" ? "selected" : null ?> > Pension</option>
						<option value="R" <?= ($source_of_funds ?? null)  == "R" ? "selected" : null ?> > Regular Remittances</option>
						<option value="S" <?= ($source_of_funds ?? null)  == "S" ? "selected" : null ?> > Salary</option>
						<option value="O" <?= ($source_of_funds ?? null)  == "O" ? "selected" : null ?> > Others</option>
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



