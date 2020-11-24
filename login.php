<?php
include('koneksi/koneksi.php');
session_start();

if(isset($_SESSION['username'])){
    header('Location: index.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Halaman Login Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/login_mhs.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>

<body>
    
    <div class="sampul">
        <div class="kolom-login">
            <img src="image/login-icon.png" alt="Login Icon" class="gambarprofil">
            <h1>Assente</h1>
            <form action="" method="POST" id="mhs_login_form">
                
                <p>Username</p>
                <input type="text" name="mhs_username" id="mhs_username" placeholder="Masukkan Username">
                <span id="error_mhs_username" class="text-danger" style="color: red;"></span>
                
                <p>Password</p>
                <input type="password" name="mhs_password" id="mhs_password" placeholder="Masukkan Password">
                <span id="error_mhs_password" class="text-danger" style="color: red;"></span>
                
                <button type="submit" name="mhs_login" id="mhs_login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>


<script>
$(document).ready(function(){
  $('#mhs_login_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"check_mhs_login.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#mhs_login').html('Validate...');
      },
      success:function(data)
      {
        if(data.success)
        {
          location.href = "index.php";
        }
        if(data.error)
        {
          $('#mhs_login').html('Login');
          if(data.error_mhs_username != '')
          {
            $('#error_mhs_username').text(data.error_mhs_username);
          }
          else
          {
            $('#error_mhs_username').text('');
          }
          if(data.error_mhs_password != '')
          {
            $('#error_mhs_password').text(data.error_mhs_password);
          }
          else
          {
            $('#error_mhs_password').text('');
          }
        }
      }
    });
  });
});
</script>