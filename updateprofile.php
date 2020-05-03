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

      .input {
        margin-bottom: 1vmin;
      }

      .input-button {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 6vmin;
      }

      .bold-row {
        color: #fff;
        padding-top: 2.2vmin;
        padding-bottom: 2.2vmin;
      }
    </style>
  </head>
  <div style="text-align:center; padding-top:30px">
  <h1>Update Profile</h1>
  <body>
  <?php
    session_start();
    include "mpconnection.php";
    $conn = OpenCon();
    if (isset($_POST["updateprofile"])){
      $user = $_SESSION['user'];
    $query = mysqli_query($conn, "SELECT customer1.username, customer1.cardNumber, customer2.billingaddress, customer2.name from customer1 left join customer2 
    on customer1.cardnumber = customer2.cardnumber where customer1.username = '$user' ");

    echo '<table>
    <tr bgcolor="#00458b"> 
    <td class="bold-row">Username</b> </td>
    <td class="bold-row">Name</td>
    <td class="bold-row">Billing Address</td>
    <td class="bold-row">Card Number</td>
    </tr>';

    $row = mysqli_fetch_row($query);
    echo '<tr><td>' . $row[0]
    . '</td><td>' . $row[3] . '</td><td>' .
    $row[2] . '</td><td>' . $row[1] . '</td></tr>';
    }
    Closecon($conn);
    echo '<form action = "updateuser.php" method = post>
    <div class="input"><input class="input-button" type=submit name=changeaddress value="Update Address"></div>
    </form>';
  ?>
  </body>
  </div>
</html>