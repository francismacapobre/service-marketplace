<html>
<head>
  <title> New Profile...</title>
  <style>
    body {
      background-color: linen;
    }

    h1 {
      color: maroon;
    }

    button {
        margin-left: 20px;
    }

</style>
</head>

<div style="text-align:center;">
<h1 style="padding-top: 20px">Create New Customer Account</h1>
<body>
<form action = "customeradded.php" method = "post">

<div style="text-align:center;">
<b> Please Enter The Following </b>

<p>Username:
<input type = "text" name = "username" size = 30  required="required">
</p> 

<p>Card Number (Credit Card Only):
<input type = "text" name = "cardnum" size = 16 maxlength = 16 required="required">
</p> 

<p>Billing Address (Apt - House#, Street):
<input type = "text" name = "caddress" size = 30 required="required" >
</p> 

<p>Name (First and Last):
<input type = "text" name = "cname" size = 30 required="required">
</p> 

<p>
<input type = "submit" name = "csubmit" value = "Enter">
</p> 


</form>
</div>

</body>
</div>

</html>