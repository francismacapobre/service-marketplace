<html>
<head> <title>Verifying...</title><style>
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
<h1>Administrator Home</h1>
<body>

<?php

include 'mpconnection.php';
$conn = OpenCon();


if (isset($_POST['adminsignin'])){

    echo '<p><form action = "all-customer-info.php" method = "post">
    Customer Records: <input  type = "submit" name = "project" value = "Here">
    </form></p>';

    echo '<p><form action = "equipmentinfo.html" method = "post">
    Equipment Information: <input  type = "submit" name = "project" value = "Here">
    </form></p>';

    echo '<p><form action = "agg.php" method = "post">
    Cheapest Service: <input  type = "submit" name = "agg" value = "Here">
    </form></p>';


    echo '<p><form action = "groupby.php" method = "post">
    Average Rating for Each Service Provider: <input  type = "submit" name = "groupby" value = "Here">
    </form></p>';


    echo '<p><form action = "division.php" method = "post">
    Satisfied Customers: <input  type = "submit" name = "division" value = "Here">
    </form></p>';

    echo '<p><form action = "join-query.php" method="post">
    Service Providers with Record of Completeness: <input type="submit" name ="join-query" value =
    "Here"></form></p>';
    
    echo '<p><form action = "selection-query.html" method="post">
    Search Service Providers by Rating: <input type="submit" name ="selection-query" value =
    "Here"> </form></p>';

}

Closecon($conn);

?>

</body>
</div>

</html>