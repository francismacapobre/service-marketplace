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
  <form action = "providerAdded.php" method = "post">
  <div style="text-align:center;">
  <p>Please fill</p>
  <div class="input"><input class="input-field" placeholder="Full name" type="text" name="pname" size=30 ></div>
  <div class="input"><input class="input-field" placeholder="Deposit Number" type="text" name="bankacc" size=16 maxlength=16 ></div>
  <div class="input"><input class="input-field" placeholder="Primary language" type="text" name="lang" size=30></div>
  <div class="input"><input class="input-button" type="submit" name="ssubmit" value="Enter"></div>
  </form>
  </div>

  </body>
  </div>

</html>