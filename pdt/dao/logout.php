<?php


  if(isset($_COOKIE['usuario1'])) {
unset($_COOKIE['img1']);
setcookie('usuario1', null, time()-1200, "/");
setcookie('id1', null, time()-1200, "/");
setcookie('nome1', null, time()-1200, "/");
setcookie('img1', null, time()-1200, "/");
  }
 session_start();
 
 unset($_SESSION['id1']);
 unset($_SESSION['emailUser1']);
 unset($_SESSION['nomeUser1']);
 unset($_SESSION['imgUser1']);

 session_destroy();

 echo "<script> window.location.href=\"../../index.php\" </script>";

 ?>