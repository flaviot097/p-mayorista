<?php session_start();
session_destroy();

setcookie('usuario', '', time() - 3600, "/", "yourdomain.com", true, true); // Ajusta el dominio según sea necesario
setcookie("Nombreusuario", "", time() - 3600);
header('Location: session.php');
exit(); ?>