<?php

//logout.php

session_start();
unset($_SESSION['addos']);
session_unset();
session_destroy();

header('location: login.php');

?>