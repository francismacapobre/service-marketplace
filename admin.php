<html>
  <head> 
    <title>Administrator</title>
        <style>
          body {
            background-color: white;
          }

          h1 {
            color: #00458b;
            font-family: "Courier New", Courier, monospace;
            font-size: 6vmin;
          }

          .admin-button {
            border-radius: 1vmin;
            font-family: "Lucida Console", Monaco, monospace;
            font-size: 2.2vmin;
            width: 35vmin;
            height: 6vmin;
          }

        </style>
    </head>

    <div style="text-align:center; padding-top:30px">
    <h1>Admin</h1>
<body>

<?php

include 'mpconnection.php';
$conn = OpenCon();

if (isset($_POST['adminsignin'])){

    echo '<form action="all-customer-info.php" method = "post">
    <input class="admin-button" type="submit" name="project" value="Customer Records">
    </form>';

    echo '<form action="equipmentinfo.html" method="post">
    <input class="admin-button" type="submit" name="project" value = "Equipment Info">
    </form>';

    echo '<form action="agg.php" method="post">
    <input class="admin-button" type="submit" name="agg" value="Cheapest Service">
    </form>';


    echo '<form action="groupby.php" method="post">
    <input class="admin-button" type="submit" name="groupby" value="Average Ratings">
    </form>';


    echo '<form action="division.php" method="post">
    <input class="admin-button" type="submit" name="division" value="Satisfied Customers">
    </form>';

    echo '<form action="join-query.php" method="post">
    <input class="admin-button" type="submit" name ="join-query" value="Records">
    </form>';
    
    echo '<form action= "selection-query.html" method="post">
    <input class="admin-button" type="submit" name ="selection-query" value="Search by Rating">
    </form>';

}

Closecon($conn);

?>

</body>
</div>

</html>