<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('user'); ?>

<input type="text" name="first_name" placeholder="First name" />

<input type="text" name="middle_name" placeholder="Middle Name" />

<input type="text" name="last_name" placeholder="Last Name" />

<input type="text" name="username" placeholder="Username" />

<input type="password" name="password" placeholder="Password" />

<input type="password" name="passconf" placeholder="Confirm Password" />

<input type="email" name="email" placeholder="Email" />

<select name="user_type">
	<option value="admin">Admin</option>
	<option value="teller">Teller</option>
	<option value="user">User</option>
</select>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>