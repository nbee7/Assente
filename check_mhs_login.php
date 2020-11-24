<?php

//check_admin_login.php

include('koneksi/koneksi.php');

session_start();

sleep(1);

$mhs_username = '';
$mhs_password = '';
$error_mhs_username = '';
$error_mhs_password = '';
$error = 0;

if(empty($_POST["mhs_username"]))
{
	$error_mhs_username = 'Username is required';
	$error++;
}
else
{
	$mhs_username = $_POST["mhs_username"];
}

if(empty($_POST["mhs_password"]))
{
	$error_mhs_password = 'Password is required';
	$error++;
}
else
{
	$mhs_password = $_POST["mhs_password"];
}

if($error == 0)
{
	$query = "
	SELECT * FROM tbl_mhs 
	WHERE nim = '".$mhs_username."'
	";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1){
        if($mhs_password == $row["pass_mhs"]){
            $_SESSION["username"] = $row["nim"];
        }else{
            $error_mhs_password = "Wrong Password";
            $error++;
        }
    }else{
        $error_mhs_username = "Wrong Username";
        $error++;
    }
}

if($error > 0)
{
	$output = array(
		'error'					=>	true,
		'error_mhs_username'	=>	$error_mhs_username,
		'error_mhs_password'	=>	$error_mhs_password
	);
}
else
{
	$output = array(
		'success'		=>	true
	);	
}

echo json_encode($output);

?>