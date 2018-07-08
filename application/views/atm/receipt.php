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
  text-align: center;
  margin-right: 130px;
  letter-spacing: -1px;
  margin-top: 20px;
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
  font-family: 'Montserrat light';
  font-size: 20px;
  color: #24dfda;
  margin-left: 160px;
  margin-top: -20px;
  letter-spacing: 0px;
  float: left;
  text-align: center;
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
  font-family: 'Montserrat extralight';
  font-size: 18px;
  color: white;
  margin-left: 160px;
  margin-top: -25px;
  letter-spacing: 0px;
  float: left;
  text-align: center;
}

#back-btn
{
  width:40px;
  float: right;
  margin-top: 140px;
  margin-right: 75px;
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

.receipt
{
  display: block;
  margin: auto;
  height: 330px;
  padding: 0px 100px 0px 100px;
}

</style>
<body>
<section class="container">
    <img id="main-logo" src="<?=base_url()?>resources/img/atm/atm-machine2.png">
    <h2>ATM</h2>

    <a href="<?=base_url()?>ATM/signOut">End Transaction</a>
    <img id="logout-logo" src="<?=base_url()?>resources/img/atm/logout2.png">

    <h1>Your ATM receipt</h1>

    <div class="receipt">

      <h4>Date</h4>
      <h4 >Time</h4>
      <h4>Location</h4>
      <br>
      <p style="margin-left: 160px;"><?=$receipt["date"]?></p>
      <p style="margin-left: 132px;"><?=$receipt["time"]?></p>
      <p style="margin-left: 160px;">ATM</p>

      <br>

      <h4 style="margin-top: -10px;">Account #</h4>

      <br>

      <p style="margin-left: -85px;margin-top:  5px;">XXXXXXXX<?=substr($receipt["account_id"], 8);?></p>

      <br>
      <br>

      <h4 style="margin-top: -5px; margin-left: -140px">Transaction Type</h4>
      <h4 style="margin-top: -5px; margin-left: 10px; color: white;"><?=$receipt["description"]?></h4>
      <h4 style="margin-top: -5px; margin-left: 10px;"> from</h4>
      <h4 style="margin-top: -5px; margin-left: 10px; color: white;"><?=$receipt["type"]?></h4>

      <br>

      <h4 style="margin-top: -20px;">Transaction #</h4>
      <p style="margin-left: 40px; margin-top: -20px;"><?=$receipt["transaction_id"]?></p>

      <br>

      <h4 style="margin-top: 20px; margin-left: -265px;">Amount</h4>
      <p style="margin-left: 135; margin-top: 20px;">Php. <?=floatval($receipt["amount"])?></p>

      <br>

      <h4 style="margin-top: 40px; margin-left: -490px;">Available Balance</h4>
      <p style="margin-left: 275px; margin-top: -11px;">Php. <?=floatval($receipt["balance"])?></p>
      <br>
      <h4 style="margin-top: 20px; margin-left: -490px;">Total Balance</h4>
      <p style="margin-left: 275px; margin-top: -11px;">Php. <?=floatval($receipt["balance"])?></p>

      <a href="<?=base_url()?>ATM/next" style = "margin-top: 120px;margin-right: -40px;">Continue</a>
      <img id="logout-logo" style = "margin-right: -70px;"
        src="<?=base_url()?>resources/img/atm/logout2.png">


    </div>

</section>

</body>
</html>
