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

      .input {
        margin-bottom: 1vmin;
      }
    </style>
  </head>

  <div style="text-align:center; padding-top:30px">
  <h1>Status Records</h1>
  <body>
  <p>Query the names of all service providers by service status</p>
  <form action="join-query.php" method="post">
    <div class="input"><input class="input-field" type="text" id="status" placeholder='"completed" or "in progress"' name="statusl"></div>
    <div class="input"><input class="input-button" type="submit" class="button" name="go" value="Retrieve" /></div>
  </form>
  <?php
  function myTable($obConn, $sql) 
  {
    $rsResult = mysqli_query($obConn, $sql) or die(mySqli_error($obConn));
    if (mysqli_num_rows($rsResult) > 0) {
      echo "<table> <tr bgcolor=\"#00458b\">";
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
  if (isset($_POST['go'])){
      $text = $_POST['statusl'];
  $sql = "SELECT distinct ServiceProvider.name as Name from manages inner join completesservicerequest on manages.servicerequestid =  completesservicerequest.servicerequestid 
  INNER JOIN ServiceProvider on ServiceProvider.ServiceProviderid = completesservicerequest.ServiceProviderid where manages.currentstatus = '$text' ";

    myTable($conn, $sql);
  }
  ?>
  </body>
</html>
