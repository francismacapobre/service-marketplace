

<?php
function OpenCon()
 {
    //  Production

    // Get Heroku ClearDB connection information
    // $cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $cleardb_server   = $cleardb_url["host"];
    // $cleardb_username = $cleardb_url["user"];
    // $cleardb_password = $cleardb_url["pass"];
    // $cleardb_db       = substr($cleardb_url["path"],1);

    // $dbhost = $cleardb_server;
    // $dbuser = $cleardb_username;
    // $dbpass = $cleardb_password;
    // $db = $cleardb_db;

    // Developpment
    
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