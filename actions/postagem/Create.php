<?php

include_once '../../classes/Load.php';

if(isset($_SESSION['usuario']['id'])) {
    $postagem = new Postagem;
    $postagem->id_usuario = $_SESSION['usuario']['id'];
    $postagem->titulo = $_POST['titulo'];
    $postagem->postagem = $_POST['postagem'];
    
    $postagem->adicionar();
    header("location: ../../index.php");
}
return false; 

