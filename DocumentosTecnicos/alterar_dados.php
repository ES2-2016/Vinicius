<?php
require_once("_con.php"); 

$dbc = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
echo("Ok.");
}

$sql = mysqli_query($dbc, "SELECT u.unidade_federativa, u.endereco, u.login, u.senha FROM usuario u");
$query = mysqli_query($dbc, $sql);

while($dados = $query->fetch_assoc()){
	$estado = _POST["unidade_federativa"];
	$endereco = _POST["endereco"];
	$login = _POST["login"];
	$senha = _POST["senha"];
	
}
mysqli_close($dbc);
/*
$query = mysqli_query($dbc, "UPDATE usuario SET 
			     unidade_federativa = '$estado', 
			     endereço = '$endereco', 
			     login = '$login', 
			     senha = '$senha'");
mysqli_query($dbc, $query);
mysqli_close($dbc);

*/
//header('Location: pagina_inicial.html');
?>

<form id="form1" name="form1" method="post" action="salvar_alterar_dados.php">
<input type="text" readonly name="id" id="id" value="<?php echo $estado;?>" /><br>
<input type="text" name="nome" id="nome" value="<?php echo $endereco;?>" /><br>
<input type="text" name="email" id="email" value="<?php echo $login;?>" /><br>
<input type="text" readonly name="data" id="data" value="<?php echo $senha;?>" /><br>
<input type="submit" onClick="return confirm('Deseja atualizar o registro?');" name="Submit" value="SALVAR ALTERAÇÕES" id="button-form" />
 </form>
 
</div></div>
