<?php

include_once '../../classes/Load.php';

$id = $_GET["id"];

//var_dump($id);exit;
$postagens = new Postagem();

$postagens->apagar($id);

header("location: ../../view/perfil.php");

