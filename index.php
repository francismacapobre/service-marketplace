<html>
  <head>
    <style>
     body {
        background-color: #fff;
      }

      h1 {
        color: #00458b;
        font-family: "Courier New", Courier, monospace;
        font-size: 6vmin;
      }

      p {
        color: #282828;
        font-family: "Lucida Console", Monaco, monospace;
        font-size: 2.2vmin;
      }

      .input-field {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        padding-left: 1vmin;
        width: 35vmin;
        height: 6vmin;
      }

      .input-button {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 6vmin;
      }

      .line {
        width: 35vmin;
      }

      .input {
        margin-bottom: 1vmin;
      }
    </style>
    <title>Service Marketplace</title>
  </head>
  <div style="text-align:center;">
  <body>
  <h1 style="padding-top: 20px">Service Marketplace</h1>
  <p>Customer Authentication</p>
  <form action = "process.php" method = "post">
    <div class="input"><input class="input-field" name="login" type="text" placeholder="Username"></div> 
    <div class="input"><input class="input-button" type="submit" name="signin" value="Sign in"></div>
  </form>
  <hr class="line">
  <p>Create an Account</p>
  <form action = "createnew.php" method = "post">
    <div class="input"><input class="input-button" type="submit" value="Sign up"></div>
  </form>
  <hr class="line">
  <br>
  <form action = "admin.php" method = "post">
    <div class="input"><input class="input-button" type="submit" name="adminsignin" value="Admin"></div>
  </form>
  </body>
  </div>
<html>