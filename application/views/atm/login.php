<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">

body{
	background-image: url("<?=base_url();?>resources/img/atm/bg.png");
  background-size: 1430px 700px;
}

h1
{
  font-family: montserrat semibold;
  letter-spacing: -2px;
  font-size: 30pt;
  text-align: center;

}

#atm-logo
{
margin:auto;
display:block;
padding-top: 30px;
}

p
{
  font-family: montserrat extralight;
  font-size:20pt;
  letter-spacing: -1px;
  text-align: center;
  margin-top: -32px;
}

input[type=text]
{
  border: 2px solid black;
  background-color: transparent;
  border-radius: 50px;
  height: 15px;
  width: 300px;
  margin: auto;
  display: block;
  padding: 20px 20px;
  font-family: montserrat extralight;
  color: #3d3d3d;
  font-size: 15pt;
}

input[type=password]
{
  border: 2px solid black;
  background-color: transparent;
  border-radius: 50px;
  height: 15px;
  width: 300px;
  margin: auto;
  display: block;
  padding: 20px 20px;
  font-family: montserrat extrabold;
  color: #3d3d3d;
  font-size: 15pt;
}

input[type=submit]
{
  background-color: #3cb878;
  border: none;
  border-radius: 50px;
  height: 60px;
  width: 340px;
  margin: auto;
  display: block;
  margin-top: 20px;
  font-family: montserrat light;
  color: white;
  font-size:20pt;
  box-shadow: none;
  -webkit-transition: all 0.5s;

}

input[type=submit]:hover
{
  background-color: #2fa166;


}

input:focus {
    outline:none;
}

</style>
<body>
  <img src="<?=base_url();?>resources/img/atm/atm-machine.png" id="atm-logo">
  <h1>Welcome to the ATM</h1>
  <p>Enter your account number and password</p>
	<?php
		if (isset($this->session->userdata['error_message'])) {
        echo "<span style=\"color: red;text-align: center; font-weight: bold\" id = \"result\" name = \"result\">
                <div>
                  <p>".$this->session->userdata['error_message']."</p>
                </div>
              </span>";
    }
		echo form_open('ATMController/signIn');
	?>
	  <input type="text" name="accountnum"  id="accountnum"
			value="<?php
								if(isset($this->session->userdata['login_data']['accountnum']))
									echo $this->session->userdata['login_data']['accountnum'];
								else
									echo "account number";
							?>"
		>
	  <br>
	  <br>
	  <input type="submit" value="SIGN IN">
  </form>

	<!-- jQuery 3.2.1 -->
	<script src="<?php echo base_url(); ?>resources/plugins/jQuery/jquery-3.2.1.min.js"></script>
	<!-- ATM js file-->
	<script src="<?php echo base_url(); ?>resources/js/atm.js"></script>
</body>
</html>
