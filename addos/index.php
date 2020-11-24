
<?php
session_start();
//header.php
include('../koneksi/koneksi.php');


if(!isset($_SESSION["user"]))
{
  header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
      halaman home addos
</body>
</html>