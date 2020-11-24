<?php
session_start();
//header.php
include('../koneksi/koneksi.php');


if(!isset($_SESSION["user"]))
{
  header('location: addos/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assente</title>
    <link href="../style/style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <nav>
        <!--Logo-->
        <a href="#" class="logo">Assente.</a>
        <!--Menu-->
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Team</a></li>
            <li><a class="logout_button" href="logout.php">logout</a></li>
        </ul>
    </nav>
    
</body>
</html>