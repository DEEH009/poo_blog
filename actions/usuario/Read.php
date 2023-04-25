<?php

 include_once '../../classes/Load.php';

 

$usuarios = new Usuarios();

$usuarios->email = $_POST['email'];
$usuarios->senha = $_POST['senha'];

$resultado = $usuarios->logar();
if (!$resultado) {
    header("location: ../../view/registrar.php");
    exit;    
}
$_SESSION['usuario'] =  $resultado;

//var_dump($_SESSION['usuario']['id']);exit;

header("location: ../../index.php");
exit;

