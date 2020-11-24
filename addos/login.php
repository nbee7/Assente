<?php
include('header_login.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../style/style.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assente</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <section>
        <!--Text-->
        <div class="text-container">
            <p></p>
            <p>Absensi <span style="color: #3C64B1; font-size: 4vw;">Kehadiranmu</span></p>
            <h3>Online Attendance lets you easily monitor, record and <br>evaluate the Attendance of students, <br>both at home and on campus </h3>
            
        </div>
    </section>

    <div class="sampul">
        <div class="kolom-login">
            <img src="../image/assente.png" alt="Login Icon" class="gambarprofil">
            <h1>Assente</h1>
            <form action="" method="POST" id="addos_login_form">
                <p>Username</p>
                <input type="text" name="addos_username" id="addos_username" placeholder="Masukkan Username">
                <span id="error_addos_username" class="text-danger" style="color: red;"></span>
                <p>Password</p>
                <input type="password" name="addos_password" id="addos_password" placeholder="Masukkan Password">
                <span id="error_addos_password" class="text-danger" style="color: red;"></span>
                <button type="submit" name="addos_login" id="addos_login">Login</button>
            </form>
        </div>
    </div>

</body>
</html>

<script>
$(document).ready(function(){
  $('#addos_login_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"check_addos_login.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#addos_login').html('Validate...');
      },
      success:function(data)
      {
        if(data.success)
        {
          location.href = data.base_url;
        }
        if(data.error)
        {
          $('#addos_login').html('Login');
          if(data.error_addos_username != '')
          {
            $('#error_addos_username').text(data.error_addos_username);
          }
          else
          {
            $('#error_addos_username').text('');
          }
          if(data.error_addos_password != '')
          {
            $('#error_addos_password').text(data.error_addos_password);
          }
          else
          {
            $('#error_addos_password').text('');
          }
        }
      }
    });
  });
});
</script>