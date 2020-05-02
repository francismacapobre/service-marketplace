<?php
function OpenCon()
 {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "marketplace";

    $conn = new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connect to MarketPlace fialed : %s\n". $conn ->error);
    return $conn;

 }

function Closecon($conn)
{
    $conn -> close();
}
?>