<?php
  $login_cookie = $_COOKIE['login'];
    if(isset($login_cookie)){
      echo"Bem-Vindo ao sistema de Memorial, $login_cookie <br>!";
      echo"O objetivo do memorial é usar para apresentações em concursos para ingresso e promoção na carreira docente e em exames de seleção ou de qualificação, anexar alguns documentos comprobatórios.";
    }else{
      echo"Bem-Vindo ao sistema de Memorial, convidado <br>";
      echo"O objetivo do memorial é usar para apresentações em concursos para ingresso e promoção na carreira docente e em exames de seleção ou de qualificação, anexar alguns documentos comprobatórios.";
      echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
    }
?>
