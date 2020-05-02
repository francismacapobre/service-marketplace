<?php
include 'mpconnection.php';
$conn = OpenCon();
echo "<p>Successfully Connected to Market Place</p>";   

Closecon($conn);

?>