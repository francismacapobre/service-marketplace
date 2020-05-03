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

  <div style="text-align:center; padding-top:30px">
  <p>Success</p>
  <body>
  <p> Redirecting...</p>
  <?php
  session_start();
  include 'mpconnection.php';
  $conn = OpenCon();
  $user = $_SESSION['custid'];
  $comment = $_POST["textR"];
  $rating = $_POST["rating"];
  $providerid = $_SESSION['providerid'];
  $sql = "Insert Ignore Into Review(RevieweeID, ReviewerID, Rating, comment) 
    Values($providerid, $user, $rating, '$comment')";
  if (isset($_POST['leave-review'])) {
    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
  }
  header('refresh:3; url=https://mighty-hamlet-96281.herokuapp.com/index.php');
  ?>
  </body>
</html>