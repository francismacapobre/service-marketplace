<html>
  <head>
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
  if(isset($_POST['newad'])){
    $user = $_SESSION['user'];
    $query = "UPDATE customer1 inner join customer2 on customer1.cardnumber = customer2.cardnumber
    set customer2.billingaddress = '$_POST[newad]' WHERE customer1.username = '$user'";
    if (mysqli_query($conn, $query)) {
      echo "<p>Update successful</p>";
      echo "<p>Redirecting...</p>";
      header('refresh:3; url=https://mighty-hamlet-96281.herokuapp.com/index.php');
    } else {
      echo "Error: " . mysqli_error($conn);
        
    }
  }
  CloseCon($conn);
  ?>
  </body>
  </div>
</html>