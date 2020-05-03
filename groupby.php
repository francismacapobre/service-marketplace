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
  <h1>Average Review Ratings</h1>
  <body>
  <?php
  include "mpconnection.php";
  $conn = OpenCon();

  if (isset($_POST['groupby'])){
    $query = "SELECT serviceprovider.name as `Service Provider Name`, avg(rating) as `Average Rating`
    From review inner join serviceprovider
    on review.revieweeid = serviceprovider.serviceproviderid
    Group by review.revieweeid";
    $result = mysqli_query($conn,$query);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
    }

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