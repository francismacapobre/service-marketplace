<html>
    <head><style>
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

<div style="text-align:center; padding-top:30px">
<body>
<h1> Cheapest service price</h1>
<h4>Retrieve the price of cheapest service that is available.</h4>
<form action="agg.php" method="post">
    <input type="submit" class="button" name="WORST" value="Retrieve" />
</form>

<form action="agg2.php" method="post">
    <input type="submit" class="button" name="insertnewservice" value="Update Service Price" />
</form>


<?php
function get_table($conn, $sql) {
    $result = mysqli_query($conn,$sql) or die(mySqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
        $i = 0;
        while ($i < mysqli_num_fields($result)) {
            $field = mysqli_fetch_field_direct($result, $i);
            $fieldName=$field->name;
            echo "<td align = center><strong>$fieldName</strong></td>";
            $i = $i + 1;
        }
    echo "</tr>";

    $bolWhite = true;
    while ($row = mysqli_fetch_assoc($result)) {
        echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
        $bolWhite=!$bolWhite; 
        foreach($row as $data) {
            echo "<td align = center>$data</td>";
        }
        echo "</tr>";
    }
    echo"</table>";

    }
}

    include 'mpconnection.php';
    
    $conn = OpenCon();

    $sql = "SELECT min(Price) as Price from ProvidedService2";
    
    if (isset($_POST['WORST'])){
        get_table($conn, $sql);
    }


    Closecon($conn);

?>

</body>
</div>

</html>