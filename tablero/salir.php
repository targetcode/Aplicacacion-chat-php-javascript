<?php 

session_start();

$_SESSION['id']= null;
$_SESSION['auth']= null;
$_SESSION['nombre']= null;
$_SESSION['avatar']= null;

session_destroy();

header('location:../');
exit();