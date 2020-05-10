<?php
if(isset($_COOKIE['usuario'])) {
unset($_COOKIE['img']);
setcookie('usuario', null, time()-1200, "/");
setcookie('id', null, time()-1200, "/");
setcookie('nome', null, time()-1200, "/");
setcookie('img', null, time()-1200, "/");
  }
error_reporting(0);
 session_start();

 unset($_SESSION['id']);
 unset($_SESSION['emailUser']);
 unset($_SESSION['nomeUser']);
 unset($_SESSION['imgUser']);

 session_destroy();

 echo "<script> window.location.href=\"../../index.php\" </script>";

 ?>