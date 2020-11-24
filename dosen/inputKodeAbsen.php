<?php
include("../koneksi/koneksi.php");

if(isset($_POST['generate_code1'])){
    $kodeAbsen = $_POST['generate_code1'];
    $query = "INSERT INTO absen (kode_absen) VALUES('$kodeAbsen')";
    mysqli_query($conn, $query);

    $output = array(
        'success'		=>	true,
        'kode'          => $kodeAbsen
	);
}
echo json_encode($output);


?>