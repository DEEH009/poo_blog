<?php
include_once '../../classes/Load.php';


$id = $_GET["id"];


$postagem = new Postagem();
$postagem->id = $_POST['id'];
$postagem->titulo = $_POST['titulo'];
$postagem->postagem = $_POST['postagens'];

$postagem->editar($_POST['id']);
var_dump($postagem); exit;
header("location: ../../view/perfil.php");
