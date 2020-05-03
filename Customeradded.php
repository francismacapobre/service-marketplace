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
  <head>

  <div style="text-align:center;">
  <body>
  <?php
  include 'mpconnection.php';
  if (isset($_POST['csubmit'])) {
    $data_missing = array();
    $conn = Opencon();
    if(empty($_POST['username'])){
      $data_missing[] = 'username';
    } else {
      $username = $_POST["username"];
    }
    if(empty($_POST['cardnum'])){
      $data_missing[] = 'cardnum';
    } else {
      $cardnum = $_POST["cardnum"];
    }
    if (empty($data_missing)){  
      $query = "INSERT INTO Customer1(username,cardNumber) VALUE(?,?)";
      $stmt = mysqli_prepare($conn,$query);
      mysqli_stmt_bind_param($stmt, "si",$username,$cardnum);
      mysqli_stmt_execute($stmt);
      $affected_rows = mysqli_stmt_affected_rows($stmt);
      if ($affected_rows == 1){
        echo '<p>Account Created</p>';
        mysqli_stmt_close($stmt);
        CloseCon($conn);
      } else {
        echo "<p>Error in Customer 1 </p>";
        echo "<p>" .mysqli_error($conn). "</p>";
        mysqli_stmt_close($stmt);
        CloseCon($conn);
      }
    } else {
      echo "<p>Please enter all fields</p>";
    }
  }

  if (isset($_POST['csubmit'])){
    $data_missing = array();
    $conn = Opencon();
    if(empty($_POST['cardnum'])){
      $data_missing[] = 'cardnum';
    } else {
      $cardnum = $_POST["cardnum"];
    }
    if(empty($_POST['caddress'])){
      $data_missing[] = 'caddress';
    } else {
      $caddress = $_POST["caddress"];
    }
    if(empty($_POST['cname'])){
      $data_missing[] = 'cname';
    } else {
      $cname = $_POST["cname"];
    }
    if (empty($data_missing)) {
      $query2 = "INSERT INTO Customer2(cardNumber,billingAddress,name) VALUE(?,?,?)";
      $stmt2 = mysqli_prepare($conn,$query2);
      mysqli_stmt_bind_param($stmt2, "iss",$cardnum,$caddress,$cname);
      mysqli_stmt_execute($stmt2);
      $affected_rows2 = mysqli_stmt_affected_rows($stmt2);
      if ($affected_rows2 == 1) {
        echo '<p>'.$cname.'</p>';
        mysqli_stmt_close($stmt2);          
      } else {
        echo "<p>Error in Customer2 </p>";
        echo "<p>" .mysqli_error($conn). "</p>";
        mysqli_stmt_close($stmt2); 
      }
    } else {
      echo "Please Enter All The Fields!";
    }
  }
  echo "<p>Redirecting...</p>";
  header('refresh:3; url=https://mighty-hamlet-96281.herokuapp.com/index.php');
  CloseCon($conn);
  ?>
  </body>
  </div>
</html>