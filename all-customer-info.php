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
<h1>Records about all customers registered</h1>
<body>
<h4> This shows all the information regarding the customers of the app.</h4>
<form action="all-customer-info.php" method="post">
    <input type="submit" class="button" name="go" value="Retrieve" />
</form>

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
        echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
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
$conn = OpenCon();
$sql = "select * from customer1 NATURAL JOIN customer2";

if (isset($_POST['go'])){
   myTable($conn, $sql);
}

?>

</body>



</html>
