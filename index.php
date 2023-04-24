<?php
$page_title = "Pagina Inicial"; 
include (__DIR__ . "/view/components/header.php");
?>
<body>
<button type="submit"><a href='../view/perfil.php'>Perfil</a></button>

    <h5>Poste Algo Legal ai!!!</h5>
   <form  method="post" action="../actions/postagem/Create.php"> 
  
    <input name="titulo" type="text" placeholder="Titulo">
    <input name="postagem" type="text" placeholder="Postagem">
    <button type="submit">Postar</button> 
   </form>


   <?php
   $postagens = new Postagem();

   echo $postagens->exibir();

   
   ?>

</body>
</html>



