<?php 

$login_usuario = $_POST['login'];
$senha_usuario = MD5($_POST['senha']);
$nome_usuario = $_POST['nome'];
$data_nascimento_usuario = $_POST['data_nascimento'];
$sexo_usuario = $_POST['sexo'];
$cpf_usuario = $_POST['cpf'];
$rg_usuario = $_POST['rg'];
$estado_usuario = $_POST['unidade_federativa'];
$end_usuario = $_POST['endereco'];

$connect = mysql_connect('localhost','root','root');
$db = mysql_select_db('memorial');
$query = "INSERT INTO usuarios(nome, login, senha, data_nascimento, sexo, cpf, rg, unidade_federativa, endereço) VALUES ('$nome_usuario', '$login_usuario', '$senha_usuario', '$dat_nascimento_usuario', '$sexo_usuario', '$cpf_usuario', '$rg_usuario', '$estado_usuario', '$end_usuario')";
$insert = mysql_query($query);

if($insert){
	header("Location: http://localhost/");
}else{
	echo"<script lenguage='javascript' type='text/javascript'>alert('Erro no cadastro'); window.location.href='../index.php';</script>";
}


?>
