<html>
<head><title> Satisfied Customers</title><style>
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
<h1>Satisfied Customers</h1>
<body>
<h4>This retrieves all customers who rated their experience above 3.</h4>
<form action="division.php" method="post">
    <input type="submit" class="button" name ="go" value="Retrieve"/>
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
            echo "<td><strong>$fieldName</strong></td>";
            $i = $i + 1;
        }
    echo "</tr>";

    $bolWhite = true;
    while ($row = mysqli_fetch_assoc($result)) {
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


include "mpconnection.php";
$conn = OpenCon();
$sql = "Select Distinct c2.name from customer1 c1, customer2 c2, review r
 where c1.cardNumber = c2.cardNumber AND r.ReviewerID = c1.customerID AND
 not exists 
         ((Select ReviewerID from review where ReviewerID = c1.customerID)
           Except (Select ReviewerID from review where rating > 3))";
if (isset($_POST['go'])) {
    get_table($conn, $sql);
}

?>
</body>
</div>

</html>