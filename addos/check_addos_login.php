<?php

//check_admin_login.php

include('../koneksi/koneksi.php');

session_start();

sleep(1);

$addos_username = '';
$addos_password = '';
$error_addos_username = '';
$error_addos_password = '';
$error = 0;

if(empty($_POST["addos_username"]))
{
	$error_addos_username = 'Username is required';
	$error++;
}
else
{
	$addos_username = $_POST["addos_username"];
}

if(empty($_POST["addos_password"]))
{
	$error_addos_password = 'Password is required';
	$error++;
}
else
{
	$addos_password = $_POST["addos_password"];
}

if($error == 0)
{
	$query = "
	SELECT * FROM tbl_user 
	WHERE username = '".$addos_username."'
	";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1){
        if($addos_password == $row["pass_user"]){
			$_SESSION["user"] = $row["username"];
			$_SESSION["level"] = $row["level"];
			if($_SESSION["level"] == "admin"){
				$base_url1 = "http://localhost/assente/admin";
			}else{
				$base_url1 = "http://localhost/assente/dosen";
			}
        }else{
            $error_addos_password = "Wrong Password";
            $error++;
        }
    }else{
        $error_addos_username = "Wrong Username";
        $error++;
    }
}

if($error > 0)
{
	$output = array(
		'error'					=>	true,
		'error_addos_username'	=>	$error_addos_username,
		'error_addos_password'	=>	$error_addos_password
	);
}
else
{
	$output = array(
		'success'		=>	true,
		'base_url'		=>  $base_url1
	);	
}

echo json_encode($output);

?>