<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300" rel="stylesheet">

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
  margin-right: 150px;
  letter-spacing: -1px;
  margin-top: 10px;
}
h3
{
  font-family: 'Montserrat extralight';
  font-size: 25px;
  color: #24dfda;
  text-align: center;
  margin-top: -30px;
}
a
{
	font-family: 'Montserrat extralight';
	font-size: 20px;
	color: white;
  text-align: right;
  margin-top: -35px;
  margin-right: 30px;
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
	margin-left: 5px;
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
  height: 130px;
  margin: auto;
  width: 50%;
  padding: 10px;
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
  letter-spacing: -1px;
	-webkit-margin-before: 10px;
	-webkit-margin-after: 0px;
	float: left;
}
h5
{
  font-family: 'Montserrat semibold';
  font-size: 35px;
  color: white;
  margin-left: 10px;
  letter-spacing: -1px;
	-webkit-margin-before: 0px;
	-webkit-margin-after: 0px;
	float: left;
}
p
{
  font-family: 'Montserrat semibold';
  font-size: 25px;
  color: white;
  margin-top: 68px;
  margin-left: 10px;
  float: left;
}
#back-btn
{
  width:25px;
  display: block;
  float: right;
	margin-left: 5px;
}

input:focus {
    outline:none;
}

</style>
<body>
<section class="container">
		<img id="main-logo" src="<?=base_url()?>resources/img/atm/atm-machine2.png">
    <h2>ATM</h2>

    <a href="<?=base_url()?>ATM/signOut">End Transaction
    	<img id="logout-logo" src="<?=base_url()?>resources/img/atm/logout2.png">
		</a>

    <h1>Balance Inquiry</h1>
    <div class="savings">
			<h4>Account #:</h4>
      <h5>XXXXXXXX<?=substr($account_id, 8);?></h5>
			<br><br><br>
      <h4>Savings :</h4>
      <h5 style = "margin-left: 30px">Php. <?=$balance?></h5>
    </div>

	  <a href="<?=base_url()?>ATM/next" style="margin-top: 90px">
			another transaction
			<img id="back-btn" src="<?=base_url()?>resources/img/atm/restart.png">
		</a>



</section>

</body>
</html>
