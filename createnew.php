<html>
<head>
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
  <title>Select User Type</title>
</head>

<body>

<div style="text-align:center;">
<h1 style="padding-top: 20px">Account Creation</h1>
<br></br>
<b>What kind of user are you?</b>

<br></br>
<form action = "newcustomer.php" method = "post">
<input name = "newcustomer" type = "submit" value = "Customer">
</form>

<form action = "newprovider.php" method = "post">
<input name = "newsp" type = "submit" value = "Service Provider">
</form>
</div>

</body>
</html>