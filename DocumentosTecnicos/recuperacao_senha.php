<?php
require_once("_con.php"); 
require("class.phpmailer.php");
require("class.smtp.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha_do_usuario;
$dbc = mysqli_connect($host, $user, $pass, $db);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$query = mysqli_query($dbc, "SELECT senha FROM usuario WHERE nome = '$nome' AND cpf = '$cpf'");
mysqli_query($dbc, $query);
$row = mysqli_fetch_row($query);

mysqli_close($dbc);


$mail = new PHPMailer();
//Habilita o debugger do servidor smtp. 
$mail->SMTPDebug = 3;   
$mail->IsSMTP();

//nome do servidor smtp                          
$mail->Host = "smtp.gmail.com";

//deixar em true se o servidor smtp necessitar de autenticação
$mail->SMTPAuth = true;

//Nome e usuário para a autenticação do servidor smtp   
$mail->Username = "memorialsystem@gmail.com";                 
$mail->Password = "mudar1234";

// se o servidor smtp necessitar de criptografia TLS
$mail->SMTPSecure = "tls";                           

//Porta TCP para conectar no servidor smtp
$mail->Port = 587;

//Email e nome de quem está enviando remetente
$mail->From = "memorialsystem@gmail.com";
$mail->FromName = "Siste Memorial";      
$mail->AddAddress($email);
$mail->IsHTML(true);
$mail->Subject  = "Recuperação de senha"; // Assunto da mensagem
$mail->Body = "Site Memorial  :)";
$mail->AltBody = $row;                            

if(!$mail->send()) {
    echo "Não foi possível enviar o e-mail.";
	echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
} 
else{
    echo "Sua senha foi enviada para $email";
}

header('Location: login.html');

?>

