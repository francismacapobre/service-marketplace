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
<h1>Service Providers Complete Record</h1>
<body>
<h4> This retrieves the names of all service providers who have either a record of complete or incomplete services.

</h4>
<h5> The status of service resuest is either "completed" or "in progress"</h1>
<form action="join-query.php" method="post">
    <label for="statusl">Status of service request: </label>  
    <input type="text" id="status" name="statusl"><br><br>
    <input type="submit" class="button" name="go" value="Retrieve Service Provider Record" />
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

if (isset($_POST['go'])){
    $text = $_POST['statusl'];
$sql = "SELECT distinct ServiceProvider.name from manages inner join completesservicerequest on manages.servicerequestid =  completesservicerequest.servicerequestid 
INNER JOIN ServiceProvider on ServiceProvider.ServiceProviderid = completesservicerequest.ServiceProviderid where manages.currentstatus = '$text' ";

   myTable($conn, $sql);
}


?>

</body>



</html>
