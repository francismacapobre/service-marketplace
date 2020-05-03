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
      padding-bottom: 2vmin;
    }

    .input-button {
      border-radius: 1vmin;
      font-family: "Lucida Console", Monaco, monospace;
      font-size: 2.2vmin;
      width: 35vmin;
      height: 6vmin;
    }
    </style>
  </head>

  <body>
    <div style="text-align:center;">
    <h1 style="padding-top: 20px">Account Creation</h1>
    <p>What kind of user are you?</p>

    <br></br>
    <form action="newcustomer.php" method="post">
    <input class="input-button" name="newcustomer" type="submit" value="Customer">
    </form>

    <form action="newprovider.php" method="post">
    <input class="input-button" name="newsp" type="submit" value="Service Provider">
    </form>
    </div>
  </body>
</html>