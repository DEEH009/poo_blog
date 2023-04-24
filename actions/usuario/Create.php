<?php
 
 include_once '../../classes/Load.php';

 $usuarios =  new Usuarios;


 $usuarios->nome = $_POST['nomeUsu'];
 $usuarios->email = $_POST['email'];
 $usuarios->senha = $_POST['senha'];
 $usuarios->aniversario = $_POST['niver'] ;
 
 
  $usuarios->cadastrar();

  //var_dump($usuarios);exit;

  header("location: ../../view/logar.php");
 