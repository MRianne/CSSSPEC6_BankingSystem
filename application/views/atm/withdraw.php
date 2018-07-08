<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<style type="text/css">

body{
	background-image: url("<?=base_url()?>resources/img/atm/bg2.png");
  background-size: 1430px 700px;
}
.container{
	width: 70%;
    height:80%;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    position: fixed;
    margin: auto;
    background-color: white;
    z-index: 1;
    overflow-x: hidden;
    background-image: url("<?=base_url()?>resources/img/atm/main bg.png");
    background-size: 1000px 600px;
    background-position: bottom;
    border-radius: 5px;
    box-shadow: 1px 4px 40px -2px rgba(61,61,61,1);
}



h2{
	font-family: 'Montserrat extrabold';
	font-size: 35px;
	color: white;
  float: left;
  margin-left: 65px;
  margin-top: 15px;

}

h1
{
  font-family: 'Montserrat semibold';
  font-size: 40px;
  color: white;
  text-align: center;

  letter-spacing: -1px;
  margin-top: 50px;
}

h3
{
  font-family: 'Montserrat extralight';
  font-size: 25px;
  color: #24dfda;
  text-align: center;
  margin-top: -40px;
}

a
{
	font-family: 'Montserrat extralight';
	font-size: 20px;
	color: white;
  text-align: right;
  margin-top: -35px;
  margin-right: 60px;
  display: block;
  letter-spacing: -1px;
  text-decoration: none;
  -webkit-transition: all 0.3s;

}

a:hover
{
  color: #24dfda;
}

#main-logo
{
  margin-left: -120px;
  width:35px;
  margin-top: 20px;
}

#logout-logo
{
  width:25px;
  display: block;
  float: right;
  margin-top: -24px;
  margin-right: 30px;
}

input[type=submit]
{
  background-color: white;
  border: none;
  height: 70px;
  width: 400px;
  margin: auto;
  display: block;
  margin-top: 0px;
  font-family: montserrat semibold;
  letter-spacing: -1px;
  color: #24dfda;
  font-size:23pt;
  box-shadow: none;
  -webkit-transition: all 0.5s;
  box-shadow: 1px 4px 40px -8px rgba(61,61,61,1);

}

input[type=submit]:hover
{
  border: 2px solid #24dfda;
  background-color: transparent;
  color: white;
}

.savings
{
  border: 3px solid white;
  border-radius: 3px;
  background-color: transparent;
  display: block;
  height: 130px;
  width: 230px;
  margin: auto;
  float: left;
  margin-left: 205px;
}

.account
{
  border: 3px solid white;
  border-radius: 3px;
  background-color: transparent;
  display: block;
  height: 130px;
  width: 230px;
  margin: auto;
  float: left;
  margin-left: 20px;
}

h4
{
  font-family: 'Montserrat extralight';
  font-size: 25px;
  color: #24dfda;
  margin-left: 70px;
  margin-top: 25px;
  letter-spacing: -1px;
}

h5
{
  font-family: 'Montserrat semibold';
  font-size: 35px;
  color: white;
  margin-left: 50px;
  margin-top: -30px;
  letter-spacing: -1px;
}

p
{
  font-family: 'Montserrat semibold';
  font-size: 20px;
  color: white;
  margin-top: 150px;
  margin-right: -90px;
  float: right;
}

#back-btn
{
  width:25px;
  float: right;
  margin-top: 150px;
  margin-right: 35px;
}

input[type=text]
{
  border: 2px solid white;
  background-color: transparent;
  border-radius: 50px;
  height: 15px;
  width: 300px;
  margin: auto;
  display: block;
  padding: 20px 20px;
  font-family: montserrat extralight;
  color: white;
  font-size: 15pt;
	text-align: center;
}

input[type=button]
{
  background-color: #3cb878;
  border: none;
  border-radius: 50px;
  height: 60px;
  width: 340px;
  margin: auto;
  display: block;
  margin-top: 10px;
  font-family: montserrat light;
  color: white;
  font-size:20pt;
  box-shadow: none;
  -webkit-transition: all 0.5s;
  cursor: pointer;
}

input[type=button]:hover
{
  background-color: #2fa166;
}

input:focus {
    outline:none;
}

</style>
<script type="text/javascript">
  var readOnlyLength = $('#field').val().length;

$('#output').text(readOnlyLength);

$('#field').on('keypress, keydown', function(event) {
  var $field = $(this);
  $('#output').text(event.which + '-' + this.selectionStart);
  if ((event.which != 37 && (event.which != 39)) &&
    ((this.selectionStart < readOnlyLength) ||
      ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
    return false;
  }
});
</script>
<body>
<section class="container">
		<img id="main-logo" src="<?=base_url()?>resources/img/atm/atm-machine2.png">
    <h2>ATM</h2>

    <a href="href<?=base_url()?>ATM/signOut">
			End Transaction
    	<img id="logout-logo" src="<?=base_url()?>resources/img/atm/logout2.png">
		</a>

    <h1>Withdraw</h1>
    <h3>Enter amount to withdraw</h3><br>
		<h3>(Php.)</h3>
		<?=form_open("TransactionController/atm_withdraw")?>
	    	<input id="amount" type="text" name="amount" value="0.00"/>
				<?php
					if (isset($this->session->userdata['error_message'])) {
			        echo "<span style=\"color: red;text-align: center; font-weight: bold\" id = \"result\" name = \"result\">
			                <div>
			                  <small>".$this->session->userdata['error_message']."</small>
			                </div>
			              </span>";
			    }
					?>
	    <br>
	    <input type="submit" value="submit">
		</form>
    <a href="<?=base_url()?>ATM/next">
			<img id="back-btn" src="<?=base_url()?>resources/img/atm/restart.png">
			<p>Cancel</p>
		</a>



</section>

</body>
</html>
