<html>
  <head>
    <style>
      body {
        background-color: white;
      }

      h1 {
        color: #00458b;
        font-family: "Courier New", Courier, monospace;
        font-size: 6vmin;
      }

      .input-field {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        padding-left: 1vmin;
        width: 35vmin;
        height: 6vmin;
      }

      .input-button {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 6vmin;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      p {
        color: #00458b;
        font-family: "Lucida Console", Monaco, monospace;
      }

      table, th, td {
        border: 1px solid #808080;
        font-family: "Lucida Console", Monaco, monospace;
        padding: 1.2vmin;
        text-align: left;
      }

      .bold-row {
        color: #fff;
      }

      .input {
        margin-bottom: 1vmin;
      }
    </style>
  </head>

  <div style="text-align:center; padding-top:30px">
  <body>
  <h1>Update Service Price</h1>
  <form action= "agg-second.php" method="post">
    <div class="input"><input class="input-field" name="service-type" type="text" placeholder="Service" required="required"/></div> 
    <div class="input"><input class="input-field" name="price-value" type="text" placeholder="Price" required="required"/></div>
    <div class="input"><input class="input-button" name="update-database" type=submit value="Update"/></div>
  </form>

  <?php
  function get_table($conn, $sql) {
    $result = mysqli_query($conn,$sql) or die(mySqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
      echo "<table> <tr bgcolor=\"#00458b\">";
      $i = 0;
      while ($i < mysqli_num_fields($result)) {
        $field = mysqli_fetch_field_direct($result, $i);
        $fieldName=$field->name;
        echo "<td class=\"bold-row\"><strong>$fieldName</strong></td>";
        $i = $i + 1;
      }
    echo "</tr>";
    $bolWhite = true;
    while ($row = mysqli_fetch_assoc($result)) {
      echo $bolWhite ? "<tr bgcolor=\"#F0F0F0\">" : "<tr bgcolor=\"#FFF\">";
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

  get_table($conn, "SELECT servicetype as Service, price as Price FROM providedservice2");
    if (isset($_POST['update-database'])){
      $servicetype = @$_POST['service-type'];     
      $price = @$_POST['price-value'];
      $sql = "UPDATE providedservice2 set providedservice2.price = '$price'
      where providedservice2.servicetype =  '$servicetype' ";

      if (mysqli_query($conn, $sql)) {
        echo "<p>Update successful</p>";
        echo "<p>Redirecting...</p>";
        header('refresh:3; url=http://localhost/agg.php');
      } else {
        echo "Error: " . mysqli_error($conn);     
      }
    }
  ?>
  </body>
</html>