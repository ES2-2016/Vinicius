<?php 
require_once("_con.php");

$cadastrar = $_POST['cadastrar'];
$login_usuario = $_POST['login'];
$senha_usuario = ($_POST['senha']);
$nome_usuario = $_POST['nome'];
$data_nascimento_usuario = $_POST['data_nascimento'];
$sexo_usuario = $_POST['sexo'];
$cpf_usuario = $_POST['cpf'];
$rg_usuario = $_POST['rg'];
$estado_usuario = $_POST['unidade_federativa'];
$end_usuario = $_POST['endereco'];

$dbc = mysqli_connect($host,$user,$pass, $db);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "INSERT INTO usuario VALUES ('$nome_usuario', '$login_usuario', '$senha_usuario', '$data_nascimento_usuario', '$sexo_usuario', '$cpf_usuario', '$rg_usuario', '$estado_usuario', '$end_usuario')";

mysqli_query($dbc, $query);
mysqli_close($dbc);
header('Location: login.html')


?>
