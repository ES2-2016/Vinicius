<?php 
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dbc = mysqli_connect($host,$user,$pass, $db);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Dados Inválidos: %s\n", mysqli_connect_error());
    exit();
}
$busca = mysqli_query("SELECT * FROM usuario WHERE nome = '$nome' AND cpf = '$cpf'");
echo"$busca";

?>
