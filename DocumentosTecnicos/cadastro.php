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

$connect = mysql_connect('Dados','root','root');
$db = mysql_select_db('memorial');
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido.');window.location.href='cadastro.html';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('Desculpe, esse login já existe');window.location.href='cadastro.html';</script>";
        die();

      }else{
        $query = INSERT INTO usuarios(nome, login, senha, data_nascimento, sexo, cpf, rg, unidade_federativa, endereço) VALUES ('$nome_usuario', '$login_usuario', '$senha_usuario', '$dat_nascimento_usuario', '$sexo_usuario', '$cpf_usuario', '$rg_usuario', '$estado_usuario', '$end_usuario');
        $insert = mysql_query($query, $connect);
        
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Desculpe, não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }



?>
