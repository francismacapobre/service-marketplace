<html>
<head>
    <title> Welcome To The Service Market Place </title>
    <style>
        body {
        background-color: linen;
        }

        h1 {
        color: maroon;
        }

        button {
            margin-left: 20px;
        }
    </style>
<head>

<div style="text-align:center; padding-top:30px">
<h1>My Account</h1>
<body>

<?php
session_start();

include 'mpconnection.php';
$conn = OpenCon();

if (isset($_POST['login'])){
        $user = trim($_POST["login"]);
        
        $_SESSION['user'] = $_POST["login"];
    
        $query = mysqli_query($conn, "SELECT distinct customer1.* FROM Customer1 WHERE username = '$user' ") or die(mysqli_error($conn));
       
        if(mysqli_num_rows($query) > 0){
    
            $result = mysqli_query($conn, "SELECT transactiondetail.servicetype, transactiondetail.daterequested,
             transactiondetail.providerid, transactiondetail.customerid from customer1 left join customer2 on customer1.cardnumber = customer2.cardnumber
            left join transactiondetail on customer1.customerid = transactiondetail.customerid where customer1.username = '$user' ");
            
    
            echo '<table align = "center" cellspacing = "10" cellpadding = "8">
            <tr> 
            <td align = left> <b> Service </b> </td>
            <td align = right> <b> Date Requested </b> </td>
            <tr>';

            while($row = mysqli_fetch_array($result)){
               $_SESSION['custid'] = $row["customerid"];
               $_SESSION['providerid'] = $row["providerid"];
                echo '<tr><td align = "left">' . $row["servicetype"]
               . '</td><td align = "right">' . $row["daterequested"] . '</td><td align = "left">';
               echo '<form action = "leave-review.php" method = "post">
               <label for="review"> Your Review:</label>
               <input type="text" id="textR" name="textR" >
               <label for="rating"> Your Rating:</label>
               <select id="rating" name="rating">
               <option value="0">0</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
                </select>
               <input type = "submit" name = "leave-review" value = "Leave Review"  >
               </form>';

               echo '</tr>';
            }

            echo "</table>";

            echo '<form action = "updateprofile.php" method = "post">
            <input type = "submit" name = "updateprofile" value = "View/Update Profile"  >
            </form>';
            
            echo '<form action = "deleteprofile.php" method = "post">
            <input type = "submit" name = "deleteprofile" value = "Delete Profile"  >
            </form>';
            
        } else {
            echo "Invalid Username. Please try again, or create a new account";
           
        }
}

Closecon($conn);

?>
</body>
</div>

</html>