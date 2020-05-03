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

  <div style="text-align:center; padding-top:30px">
  <h1>Update Address</h1>
  <body>

  <?php
  if (isset($_POST["changeaddress"])){ 
    echo '<form action = "updatetonew.php" method=post>';
    echo '<div class="input"><input class="input-field" name=newad type=text placeholder="New Address"></div>
    <div class="input"><input class="input-button" type=submit name=updatead value=Update></form></div>';
  }
  ?>
  </body>
  </div>
</html>