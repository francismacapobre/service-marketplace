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
  $conn = Opencon();
  if (isset($_POST['ssubmit'])){
    $data_missing = array();
    if(empty($_POST['pname'])){
      $data_missing[] = 'pname';
    } else {
      $pname = $_POST["pname"];
    }
    if(empty($_POST['bankacc'])){
        $data_missing[] = 'bankacc';
    } else {
        $bankacc = $_POST["bankacc"];
    }
    if(empty($_POST['lang'])){
        $data_missing[] = 'lang';
    } else {
        $lang = $_POST["lang"];
    }

    if (empty($data_missing)){ 
        $query = "INSERT INTO ServiceProvider(name,BankAccount,LanguageSpoken) VALUE(?,?,?)";
        $stmt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt, "sis",$pname,$bankacc,$lang);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if ($affected_rows == 1){
          echo '<p>Account Created</p>';
          mysqli_stmt_close($stmt);
        } else {
          echo "<p>Error in Customer 1 </p>";
          echo mysqli_error($conn);
          mysqli_stmt_close($stmt);
        }
    } else {
      echo "<p>Please enter all fields</p>";
    }
  }

  echo "<p>Redirecting to login page...</p>";
  header('refresh:3; url=https://mighty-hamlet-96281.herokuapp.com/index.php');
  CloseCon($conn);
  ?>
  </body>
  </div>
</html>