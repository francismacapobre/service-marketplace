<?php
function myTable($obConn, $sql) 
{
    $rsResult = mysqli_query($obConn, $sql) or die(mySqli_error($obConn));

    if (mysqli_num_rows($rsResult) > 0) {
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
        $i = 0;
        while ($i < mysqli_num_fields($rsResult)) {
            $field = mysqli_fetch_field_direct($rsResult, $i);
            $fieldName=$field->name;
            echo "<td><strong>$fieldName</strong></td>";
            $i = $i + 1;
        }
    echo "</tr>";

    $bolWhite = true;
    while ($row = mysqli_fetch_assoc($rsResult)) {
      echo $bolWhite ? "<tr bgcolor=\"#F0F0F0\">" : "<tr bgcolor=\"#FFF\">";
        $bolWhite=!$bolWhite; 
        foreach($row as $data) {
            echo "<td>$data</td>";
        }
        echo "</tr>";
    }
    echo"</table>";

    }
}

include 'mpconnection.php';
$cust_cols = $_GET['cust_cols'];
$conn = OpenCon();
$sql = "select $cust_cols From EquipmentUses";

if (isset($_GET['cust_cols'])){
   myTable($conn, $sql);
}

?>

