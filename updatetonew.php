<html>
<head><title>Updating...</title><style>
    body {
    background-color: linen;
    }

    h1 {
    color: maroon;
    }

    button {
        margin-left: 20px;
    }

    </style></head>
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
        echo "<p>Record updated successfully</p>";
        echo "<p>Redirecting to login page...</p>";
        header('refresh:3; url = http://localhost/index.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        
    }
   
}

CloseCon($conn);

?>

</body>
</div>
</html>