<?php

error_reporting(0);
if(isset($_COOKIE['usuario4'])) {
unset($_COOKIE['img4']);
setcookie('usuario4', null, time()-1200, "/");
setcookie('id4', null, time()-1200, "/");
setcookie('nome4', null, time()-1200, "/");
setcookie('img4', null, time()-1200, "/");
setcookie('fone4', null, time()-1200, "/");
setcookie('cel4', null, time()-1200, "/");
  }
 session_start();

    unset($_SESSION['id4']);
    unset($_SESSION['emailAluno4']);
    unset($_SESSION["nomeAluno4"]);
    unset($_SESSION['imgAluno4']);
    unset($_SESSION['foneAluno4']);
    unset($_SESSION['celAluno4']);

 session_destroy();

 echo "<script> window.location.href=\"../../index.php\" </script>";

 ?>