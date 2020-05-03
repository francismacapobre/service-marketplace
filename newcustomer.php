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

      .input {
        margin-bottom: 1vmin;
      }
    </style>
  </head>

  <div style="text-align:center;">
  <h1 style="padding-top: 20px">Create Account</h1>
  <body>
  <form action = "Customeradded.php" method = "post">
  <div style="text-align:center;">
  <p>Please fill</p>
  <div class="input"><input class="input-field" type="text" name="username" size=30 placeholder="Username" required="required"></div>
  <div class="input"><input class="input-field" type="text" name="cardnum" size=16 maxlength=16 required="required" placeholder="Credit Card Number"></div>
  <div class="input"><input class="input-field" type="text" name="caddress" size=30 required="required" placeholder="Billing Address (House#, Street)"></div>
  <div class="input"><input class="input-field" type="text" name="cname" size=30 required="required" placeholder="Full name"></div>
  <div class="input"><input class="input-button" type="submit" name="csubmit" value="Submit"></div>
  </form>
  </div>
  </body>
  </div>
</html>