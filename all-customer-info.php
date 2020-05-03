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

      .info-button {
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
  <h1>Customer Records</h1>
  <body>
  <p>Query all users and information</p>
  <form action="all-customer-info.php" method="post">
    <input class="info-button" type="submit" name="go" value="Retrieve" />
  </form>

  <?php
  function myTable($obConn, $sql) 
  {
      $rsResult = mysqli_query($obConn, $sql) or die(mySqli_error($obConn));

      if (mysqli_num_rows($rsResult) > 0) {
        echo "<table><tr bgcolor=\"#00458b\">";
        $i = 0;
        while ($i < mysqli_num_fields($rsResult)) {
          $field = mysqli_fetch_field_direct($rsResult, $i);
          $fieldName=$field->name;
          echo "<td class=\"bold-row\"><strong>$fieldName</strong></td>";
          $i = $i + 1;
      }
      echo "</tr>";

      $bolWhite = true;
      while ($row = mysqli_fetch_assoc($rsResult)) {
          echo $bolWhite ? "<tr bgcolor=\"#F0F0F0\">" : "<tr bgcolor=\"#FFF\">";
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
