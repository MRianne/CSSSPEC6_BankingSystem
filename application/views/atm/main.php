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
  font-size: 35px;
  color: white;
  margin-right: 150px;
  text-align: center;
  letter-spacing: -1px;
  margin-top: 10px;
}

h3
{
  font-family: 'Montserrat extralight';
  font-size: 20px;
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
  margin-right: 60px;
  display: block;
  letter-spacing: -1px;
  text-decoration: none;
  -webkit-transition: all 0.3s;
  cursor: unset;

}

#buttons
{
  display: block ;
  margin-top: 0px;
  margin-right: 0px;
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

input:focus {
    outline:none;
}

</style>
<body>
<section class="container">
		<img id="main-logo" src="<?=base_url()?>resources/img/atm/atm-machine2.png">
    <h2>ATM</h2>

    <a href="signOut">logout</a>
    <img id="logout-logo" src="<?=base_url()?>resources/img/atm/logout2.png">

    <h1>Hi, <?=$this->session->userdata("user_in")["first_name"]?>!</h1>
    <h3>what would you like to do today?</h3>

    <a id="buttons" href="withdraw"><input type="submit" value="Withdraw"></a>
    <br>
    <a id="buttons" href="deposit"><input type="submit" value="Deposit"></a>
    <br>
    <a id="buttons" href="balance"><input type="submit" value="Balance"></a>


</section>

</body>
</html>
