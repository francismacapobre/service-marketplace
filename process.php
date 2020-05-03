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

      .selector {
        height: 4vmin;
        width: 10vmin;
      }

      .input-field {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        padding-left: 1vmin;
        width: 35vmin;
        height: 4vmin;
      }

      .input-button {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 4vmin;
      }

      .input-button-large {
        font-family: "Lucida Console", Monaco, monospace;
        border-radius: 1vmin;
        font-size: 2.2vmin;
        width: 35vmin;
        height: 6vmin;
      }

      .input {
        margin-bottom: 1vmin;
      }

      .bottom {
        padding-top: 2vmin;
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
        echo '<table>
        <tr bgcolor="#00458b"> 
          <td class="bold-row"><strong>Service</strong></td>
          <td class="bold-row"><strong>Date Requested</strong></td>
          <td class="bold-row"><strong>Review</strong></td>
        <tr>';

        while($row = mysqli_fetch_array($result)){
          $_SESSION['custid'] = $row["customerid"];
          $_SESSION['providerid'] = $row["providerid"];
            echo '<tr><td>' . $row["servicetype"]
          . '</td><td>' . $row["daterequested"] . '</td><td>
          <input class="input-field" type="text" id="textR" name="textR" placeholder="Comment">
          <label for="rating">Rate:</label>
          <select class="selector" id="rating" name="rating">
          <option class="option-select" value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          </select>
          <input class="input-button" type="submit" name="leave-review" value=Enter >
          </form></div></tr>';;
         
        }

        echo "</table>";
        echo '<div class="bottom"><form action = "updateprofile.php" method = "post">
        <div class="input"><input class="input-button-large" type="submit" name="updateprofile" value="Update Profile"></div>
        </form>';
        echo '<form action="deleteprofile.php" method="post">
        <div class="input"><input class="input-button-large" type="submit" name="deleteprofile" value="Delete Profile"></div>
        </form></div>';
        
    } else {
      echo "Invalid Username. Please try again, or create a new account";
    }
  }

  Closecon($conn);
  ?>
  </body>
  </div>

</html>