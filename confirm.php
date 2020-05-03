<html>
  <head>
    <title>Deleting Profile</title>  
    <style>
      body {
        background-color: #fff;
      }

      p {
        color: #00458b;
        font-family: "Lucida Console", Monaco, monospace;
        font-size: 2.2vmin;
        padding-bottom: 2vmin;
      }
    </style>
  </head>

  <div style="text-align:center;">
  <body>
  <?php
    session_start();
    include "mpconnection.php";
    $conn = OpenCon();
    if (isset($_POST["confirm"])){
      $user = $_SESSION['user'];
      $query = "DELETE customer1,customer2 
      FROM customer1 inner join customer2 on customer1.cardnumber = customer2.cardnumber
      WHERE customer1.username = '$user'";

      if (mysqli_query($conn, $query)) {
          echo "<p>Profile deleted</p>";
          echo "<p>Redirecting...</p>";
          header('refresh:3; url = http://localhost/index.php');
      } else {
          echo "Error: " . mysqli_error($conn);
      }
    }
    if (isset($_POST["deny"])){
      echo "<p>Account deletion cancelled</p>";
      echo "<p>Redirecting....</p>";
      header('refresh:3; url = http://localhost/index.php');
    }

    Closecon($conn);
  ?>
  </body>
  </div>
</html>