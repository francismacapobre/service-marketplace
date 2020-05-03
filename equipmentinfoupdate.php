<html>
  <head>
    <style>
      p {
        color: #00458b;
        font-family: "Lucida Console", Monaco, monospace;
        font-size: 2.2vmin;
        padding-bottom: 2vmin;
      }
    </style>
  </head>
  <div style="text-align:center; padding-top:30px">
  <?php

  include 'mpconnection.php';
  $conn = OpenCon();

  $old_name = $_POST['old_name'];
  $new_id = $_POST['new_id'];

  if(isset($_POST['old_name'])){
    if (isset($_POST['new_id'])) {
      $query = "UPDATE EquipmentUses set EquipmentUses.EquipmentID = '$new_id' WHERE EquipmentUses.EquipmentName = '$old_name'";
      if (mysqli_query($conn, $query)) {
        echo "<p>Update successful</p>";
        echo "<p>Redirecting...</p>";
        header('refresh:3; url=https://mighty-hamlet-96281.herokuapp.com/equipmentinfo.html');
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
    
  }
  ?>
  </div>
</html>

