<?php 
$login = $_POST['login'];
$senha = $_POST['senha'];
$connect = mysqli_connect('localhost','root','root');
$db = mysqli_select_db('memorial');


$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
$verifica = mysqli_query($query); 
echo"LOGIN: $login";
echo"SENHA: $senha";
echo"QUERY: $query";
while($row = mysql_fetch_assoc($verifica)){
	$unidade_ferativa = $row["unidade_federativa"];
	$endereco = $row["endereço"];
}

if (mysql_num_rows($verifica) > 0){
	session_start();
	$_SESSION['login']=$login;
        $_SESSION['senha']=$_POST['senha'];
	$_SESSION['unidade_federativa']=$unidade_federativa;
	$_SESSION['endereço']=$endereco;
	setcookie("login",$login);
	header('Location: pagina_inicial.html');
}else {
	session_destroy();
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['unidade_federativa']);
	unset ($_SESSION['endereço']);
       	//die();

//	header("Location:index.php");
}
//header('Location: pagina_inicial.html');
/*if (isset($entrar)) {
            
      $verifica = mysqli_query("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
var_dump($verifica);
        if (mysqli_num_rows($verifica)<=0){
        	echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
		session_destroy();
		unset ($_SESSION['login']=$login);
		unset ($_SESSION['senha']=$_POST['senha']);
          	die();
		header("Location:index.php");
        }else{
	  	session_start();
	  	$_SESSION['login']=$login;
          	$_SESSION['senha']=$_POST['senha'];
          
		setcookie("login",$login);
          	//header("Location:index.php");
		header('Location: pagina_inicial.html');
        }
    }*/
?>
