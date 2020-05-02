<html>
<head><title>Delete?...</title><style>
        body {
        background-color: linen;
        }

        h1 {
        color: maroon;
        }

        button {
            margin-left: 20px;
        }
    </style></head>

<div style="text-align:center; padding-top:30px">
<h1>Delete Account</h1>
<body>

<?php

if (isset($_POST["deleteprofile"])){
    
    echo '<form action = "confirm.php" method = post>';
    echo 'Are you sure you want to permanently delete your profile? <input type = submit name = confirm value = Yes>
    <input type = submit name = deny value = No></form>';
}


?>

</body>
</div>
</html>