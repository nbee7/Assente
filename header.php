<?php

//header.php
include('koneksi/koneksi.php');
if(!isset($_SESSION["username"])) 
    { 
        session_start(); 
    } 

if(!isset($_SESSION["username"]))
{
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assente</title>
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