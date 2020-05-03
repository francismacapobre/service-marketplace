<html>
<head><title> New Profile...</title> <style>
    body {
      background-color: linen;
    }

    h1 {
      color: maroon;
    }

    button {
        margin-left: 20px;
    }

</style></head>


<div style="text-align:center;">
<h1 style="padding-top: 20px">Create New Service Provider Account</h1>
<body>
<form action = "providerAdded.php" method = "post">

<div style="text-align:center;">
<b> Please Enter The Following </b>

<p>Name (First and Last):
<input type = "text" name = "pname" size = 30  >
</p> 

<p>Bank Account (For Receiving Payment):
<input type = "text" name = "bankacc" size = 16 maxlength = 16 >
</p> 

<p>Primary Language Spoken:
<input type = "text" name = "lang" size = 30  >
</p> 

<p>
<input type = "submit" name = "ssubmit" value = "Enter">
</p> 


</form>
</div>

</body>
</div>

</html>