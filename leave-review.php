<html>
    <head>
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
</head>

<div style="text-align:center; padding-top:30px">
<h1>Your experience has just been recorded!</h1>
<body>
<h4> Redirecting...</h4>


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

header('refresh:3; url = http://localhost/marketplace.php');

?>
</body>
</html>