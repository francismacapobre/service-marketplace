<html>
  <head>
    <style>
      body {
        background-color: #fff;
      }

      h1 {
        color: #00458b;
        font-family: "Courier New", Courier, monospace;
        font-size: 6vmin;
      }

      p {
        color: #282828;
        font-family: "Lucida Console", Monaco, monospace;
        font-size: 2.2vmin;
        padding-bottom: 2vmin;
      }

      .agg-button {
        border-radius: 1vmin;
        font-family: "Lucida Console", Monaco, monospace;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 6vmin;
      }

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

  <div style="text-align:center; padding-top:30px">
  <body>
    <h1> Cheapest Service</h1>
    <p>Query the price of the cheapest available service</p>
    <form action="agg.php" method="post">
      <input class="agg-button" type="submit" name="worst" value="Retrieve" />
    </form>
    <form action="agg-second.php" method="post">
        <input class="agg-button" type="submit" name="insertnewservice" value="Update Service Price" />
    </form>
  <?php
    function get_table($conn, $sql) {
      $result = mysqli_query($conn,$sql) or die(mySqli_error($conn));
      if (mysqli_num_rows($result) > 0) {
        echo "<table><tr bgcolor=\"#00458b\">";
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
    $sql = "SELECT min(Price) as Price from ProvidedService2";
    if (isset($_POST['worst'])){
      get_table($conn, $sql);
    }
    Closecon($conn);
  ?>
  </body>
  </div>
</html>