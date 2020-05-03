<html>
  <head>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      table, th, td {
        border: 1px solid #808080;
        font-family: "Lucida Console", Monaco, monospace;
        padding: 1.2vmin;
        text-align: left;
      }

      .bold-row {
        color: #fff;
        padding-top: 2.2vmin;
        padding-bottom: 2.2vmin;
      }

    </style>
  </head>
<?php
function myTable($obConn, $sql) 
{
  $rsResult = mysqli_query($obConn, $sql) or die(mySqli_error($obConn));

  if (mysqli_num_rows($rsResult) > 0) {
    echo "<table><tr bgcolor=\"#00458b\">";
    $i = 0;
    while ($i < mysqli_num_fields($rsResult)) {
      $field = mysqli_fetch_field_direct($rsResult, $i);
      $fieldName=$field->name;
      echo "<td class=\"bold-row\"><strong>$fieldName</strong></td>";
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
</html>