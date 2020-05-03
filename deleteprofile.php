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

      .action-button {
        border-radius: 1vmin;
        font-family: "Lucida Console", Monaco, monospace;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 6vmin;
      }
    </style>
  </head>

  <div style="text-align:center; padding-top:30px">
  <h1>Delete Account</h1>
  <body>
  <?php
    if (isset($_POST["deleteprofile"])){
      echo '<form action = "confirm.php" method = post>';
      echo '<p>Are you sure you would like to permanently delete your profile?</p>
      <input class="action-button" type=submit name=confirm value=Yes>
      <input class="action-button" type=submit name=deny value=No></form>';
    }
  ?>
  </body>
  </div>
</html>