<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    
    <h2>Edit Data</h2>

        <?php
        include "connect.php";

        $npm = $_GET['npm'];
        $query = mysqli_query($conn, "SELECT * FROM mhs WHERE npm = '$_npm'");
        while($data = mysqli_fetch_array($query)){
        ?>

        <form action="" method="post">


        </form>

        <?php
        }
        ?>


</body>
</html>