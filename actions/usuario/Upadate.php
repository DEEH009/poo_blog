<?php

include_once '../../classes/Load.php';
$usuarios = new Usuarios;
$usuarios->nome = $_POST['nomeUsu'];
$usuarios->email = $_POST['email'];
$usuarios->aniversario = $_POST['niver'];
$usuarios->atualizar($_SESSION['usuario']['id']);

//var_dump($_SESSION['usuario']);exit;

header("location: ../../view/perfil.php");
   
