<?php
require_once("_con.php"); 
$dbc = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{

header('Location: pagina_inicial.html');

?>
