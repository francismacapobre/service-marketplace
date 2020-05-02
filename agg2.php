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
<h1> Update Service Price</h1>



<form action= "agg2.php" method = "post"> Service Type:  
<input type= "text"  name= "typetype" placeholder="Enter" required="required" /> 
   Value: <input type= "text" name="valuevalue" placeholder=Enter required="required" /> <input type=submit name=xxx value=Enter />
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

get_table($conn, "SELECT servicetype, price FROM providedservice2");


    
    if (isset($_POST['xxx'])){
     
        $servicetype = @$_POST['typetype'];
        
        $price = @$_POST['valuevalue'];

        $sql = "UPDATE providedservice2 set providedservice2.price = '$price'
        where providedservice2.servicetype =  '$servicetype' ";


        if (mysqli_query($conn, $sql)) {
            echo "<p>Record updated successfully</p>";
            echo "<p>Redirecting ...</p>";
            header('refresh:3; url = http://localhost/agg.php');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
            
        }

    }

  ?>
    </body>
</html>