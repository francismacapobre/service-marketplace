<html>
<head><title> Service being completed</title><style>
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
<h1>Average Rating For Each Review </h1>
<body>


<?php
include "mpconnection.php";
$conn = OpenCon();

if (isset($_POST['groupby'])){

    $query = "SELECT serviceprovider.name, avg(rating)
    From review inner join serviceprovider
    on review.revieweeid = serviceprovider.serviceproviderid
    Group by review.revieweeid";


    $result = mysqli_query($conn,$query);


    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

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


Closecon($conn)
?>


</body>
</div>


</html>