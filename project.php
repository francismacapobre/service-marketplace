<html>
<head><title> Service Types</title></head>

<body>

<?php
include "mpconnection.php";
$conn = OpenCon();

if (isset($_POST['project'])){

    $query = "SELECT servicetype from providedservice2";

    $result = mysqli_query($conn,$query);

    echo '<table align = "left" cellspacing = "10" cellpadding = "8">
            <tr> 
            <td align = left> <b> Services </b> </td>
            <tr>';

            while($row = mysqli_fetch_array($result)){
               echo '<tr><td align = "left">' . $row["servicetype"] . '</td><td align = "left">';
               echo '</tr>';
            }

            echo "</table>";



}


Closecon($conn)
?>

</body>

</html>