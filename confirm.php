<html>
<head><title>Deleting...</title>  <style>
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


if (isset($_POST["confirm"])){
    $user = $_SESSION['user'];

    $query = "DELETE customer1,customer2 
    FROM customer1 inner join customer2 on customer1.cardnumber = customer2.cardnumber
    WHERE customer1.username = '$user'";

    if (mysqli_query($conn, $query)) {
        echo "<p>Profile Removed successfully</p>";
        echo "<p>Redirecting to login page...</p>";
        header('refresh:3; url = http://localhost/index.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}

if (isset($_POST["deny"])){
    echo "<p>Will not delete profile</p>";
    echo "<p>Redirecting to login page...</p>";
    header('refresh:3; url = http://localhost/index.php');
}

Closecon($conn);

?>

</body>
</div>
</html>