<?php

//logout.php

session_start();
session_unset();
session_destroy();

header('location: ../addos/login.php');

?>