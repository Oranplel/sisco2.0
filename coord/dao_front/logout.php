<?php

error_reporting(0);
if(isset($_COOKIE['usuario3'])) {
unset($_COOKIE['img3']);
setcookie('usuario3', null, time()-1200, "/");
setcookie('id3', null, time()-1200, "/");
setcookie('nome3', null, time()-1200, "/");
setcookie('img3', null, time()-1200, "/");
setcookie('fone3', null, time()-1200, "/");
setcookie('cel3', null, time()-1200, "/");
  }
 session_start();

 unset($_SESSION['id3']);
 unset($_SESSION['emailUser3']);
 unset($_SESSION['nomeUser3']);
 unset($_SESSION['imgUser3']);
 unset($_SESSION['foneUser3']);
 unset($_SESSION['celUser3']);

 session_destroy();

 echo "<script> window.location.href=\"../../index.php\" </script>";

 ?>