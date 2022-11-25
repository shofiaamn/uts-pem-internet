<?php
if( isset($_GET["npsn"])){
    $npsn = $_GET["npsn"];

    $server   = "localhost";
    $user     = "root";
    $password = "";
    $db       = "sekolah";

    //koneksi
    $connect  = new mysqli($server, $user, $password, $db);

    $sql = "DELETE FROM data_sekolah WHERE npsn=$npsn";
    $connect->query($sql);
}
header("location: /utsinternet/index.php");
exit;
?>