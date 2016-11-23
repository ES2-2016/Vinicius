<?php
require_once("_con.php"); 

$estado = _POST["unidade_federativa"];
$endereco = _POST["endereco"];
$login = _POST["login"];
$senha = _POST["senha"];
$dbc = mysqli_connect($host, $user, $pass, $db);
$user = _GET["login"];
echo("user");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
echo("Ok.");
}

$query = mysqli_query($dbc, "UPDATE estado, endereco, login, senha SET unidade_federativa = '$estado', endereço = '$endereco', login = '$login', senha = '$senha'");
mysqli_query($dbc, $query);
mysqli_close($dbc);


header('Location: pagina_inicial.html');
?>

