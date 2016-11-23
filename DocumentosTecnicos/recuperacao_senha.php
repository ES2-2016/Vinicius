<?php
require_once("_con.php"); 
require_once("phpmailer/class.phpmailer.php");

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
var_dump($row);
mysqli_close($dbc);

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.dominio.net";
$mail->AddAddress($email);
$mail->IsHTML(true);
$mail->Subject  = "Recuperação de senha"; // Assunto da mensagem
$mail->Body = "Site Memorial  :)";
$mail->AltBody = $row;
$enviado = $mail->Send();
$mail->ClearAllRecipients();

if ($enviado) {
	echo "Sua senha foi enviada para $email";
} else {
 	echo "Não foi possível enviar o e-mail.";
  	echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}
?>
