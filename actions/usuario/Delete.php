<?php
include_once '../../classes/Load.php';

$usuarios =  new Usuarios ;

$usuarios->deletar($_SESSION['usuario']['id']);

//var_dump($usuarios);exit;

header("location: ../../view/registrar.php");


