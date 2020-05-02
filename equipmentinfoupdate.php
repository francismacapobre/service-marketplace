<?php

include 'mpconnection.php';
$conn = OpenCon();


$old_name = $_POST['old_name'];
$new_id = $_POST['new_id'];

if(isset($_POST['old_name'])){
    if (isset($_POST['new_id'])) {
 
        $query = "UPDATE EquipmentUses set EquipmentUses.EquipmentID = '$new_id' WHERE EquipmentUses.EquipmentName = '$old_name'";
    
        if (mysqli_query($conn, $query)) {
            echo "<p>Record updated successfully</p>";
            echo "<p>Redirecting to equipment page...</p>";
            header('refresh:3; url = http://localhost/equipmentinfo.html');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
            
        }
    }
   
}


?>

