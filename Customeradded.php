<html>
<head>
    <title> Add Customer </title>
    <style>
    body {
    background-color: linen;
    }

    h1 {
    color: maroon;
    }

    button {
        margin-left: 20px;
    }

    </style>
<head>

<div style="text-align:center;">
<body>

<?php

include 'mpconnection.php';

if (isset($_POST['csubmit'])){
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
            echo '<p>Welcome!</p>' ;

            mysqli_stmt_close($stmt);

            CloseCon($conn);

        } else {
            echo "Error Occurred in Customer 1";
            echo mysqli_error($conn);

            mysqli_stmt_close($stmt);

            CloseCon($conn);
        }

    } else {
       echo "Please Enter All The Fields!";
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

    if (empty($data_missing)){
        $query2 = "INSERT INTO Customer2(cardNumber,billingAddress,name) VALUE(?,?,?)";
        $stmt2 = mysqli_prepare($conn,$query2);

        mysqli_stmt_bind_param($stmt2, "iss",$cardnum,$caddress,$cname);

        mysqli_stmt_execute($stmt2);

        $affected_rows2 = mysqli_stmt_affected_rows($stmt2);

        if ($affected_rows2 == 1){
            echo '</p>'.$cname.'</p>';

            mysqli_stmt_close($stmt2);

            

            
            
        } else {
            echo "Error Occurred in Customer 2";
            echo mysqli_error($conn);

            mysqli_stmt_close($stmt2);
            
        }
    } else {

        echo "Please Enter All The Fields!";
     }
     
    

}

echo "<p>Redirecting to login page...</p>";
header('refresh:3; url = http://localhost/index.php');
CloseCon($conn);

?>

</body>
</div>
</html>