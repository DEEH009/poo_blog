<?php
$page_title = "Perfil"; 

include (__DIR__ . "/components/header.php");

?>

<body>



    <h2>Perfil </h2>
    <form  method="post" action="../actions/usuario/Upadate.php">
     
    <input type="hidden" name="id" value="<?=$_SESSION['usuario']['id'] ?>">
      <label> Usuario</label>
      <input name="nomeUsu" type="text"  id="nomeUsu" value="<?=$_SESSION['usuario']['name'] ?>" >

    <label> Email</label>
    <input name="email" type="text"  id="email1"  value="<?=$_SESSION['usuario']['email'] ?>">

    <label>Data de Aniversário</label>
    <input name="niver" type="date"  id="niver" value="<?=$_SESSION['usuario']['data_aniversario'] ?>">

    <button type="submit">Editar</button> 
  </form>
  <button type="submit"><a href='../actions/usuario/Delete.php'>Excluir Perfil</a></button>


  <h3>Suas Postagens</h3>

  <?php
  $postagens = new  Postagem();

  echo  $postagens->meusPost($_SESSION['usuario']['id']);

  
  //var_dump($_SESSION['usuario']['id']);exit;
  ?>
  
</body>

