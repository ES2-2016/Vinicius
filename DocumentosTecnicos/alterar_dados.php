<?php
require_once("_con.php");
session_start();
$login = $_SESSION['login'];
$estado = $_POST['unidade_federativa'];
$endereco = $_POST['endereco'];
$senha = $_POST["senha"];
$_SESSION['login']=$login;
$_SESSION['estado']=$estado;
$_SESSION['endereco']=$endereco;
$_SESSION['senha']=$_POST['senha'];
echo("LOGIN: $login");

$dbc = mysqli_connect($host, $user, $pass);
mysqli_select_db($db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$query = ("UPDATE usuario SET 
	   unidade_federativa = '$estado', 
	   endereço = '$endereco', 
	   senha = '$senha'
	   WHERE login='$login'");
$insert = mysqli_query($query);
echo"$query";

if($query){
	$msgm = "Dados alterados com sucesso!";
	$msgm = wordwrap($msgm, 70);
	//header('Location: pagina_inicial.html');
}else {
	echo mysqli_errno($dbc) . ": " . mysqli_error($dbc) . "\n";	
}
//mysqli_close($dbc);


?>


