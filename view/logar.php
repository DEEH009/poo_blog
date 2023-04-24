<?php
$page_title = "Logar"; 
include (__DIR__ . "/components/header.php");
?>

<body>
    <h2>Logar</h2>

    <form method="post" action="../actions/usuario/Read.php">

    <label>Endereço de Email</label>
    <input name="email" type="text"  id="email1">

    <label>Senha</label>
    <input name="senha" type="password"  id="senha">


    <button type="submit">Logar</button> 


    </form>


</body>

