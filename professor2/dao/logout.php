<?php


	if(isset($_COOKIE['usuario2'])) {
		unset($_COOKIE['img2']);
		setcookie('usuario2', null, time()-1200, "/");
		setcookie('id2', null, time()-1200, "/");
		setcookie('nome2', null, time()-1200, "/");
		setcookie('img2', null, time()-1200, "/");
  	}
  	session_start();
 
 	unset($_SESSION['id2']);
 	unset($_SESSION['emailUser2']);
 	unset($_SESSION['nomeUser2']);
	unset($_SESSION['imgUser2']);

 	session_destroy();

 	header("Location: ../../index.php");
// echo "<script> window.location.href=\"../../index.php\" </script>";

?>