if (isset($_POST['insertnewservice'])){

echo '<form action= "agg2.php" method="post">
<input type="text" name="typetype" value="Enter" />
    </form>';
 echo '<form action= "agg2.php" method="post">
    <input type="text" name="valuevalue" value="Enter" />
    <input type = submit name = updatead value = Update>       </form>';

}


if (isset($_POST['typetype'])){
$servicetype = $_POST['typetype'];
}

if (isset($_POST['valuevalue'])){
    $price = $_POST['valuevalue'];
}


if (isset($_POST['updatead'])){

    echo "c";

    $sql = "UPDATE providedservice2 set providedservice2.price = $price
    where providedservice2.servicetype =  '$servicetype' ";

        mysqli_error($conn);

    if (mysqli_query($conn, $sql)) {
        echo "<p>Record updated successfully</p>";
        echo "<p>Redirecting ...</p>";
        header('refresh:3; url = http://localhost/agg.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        
    }

}