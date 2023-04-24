<?php
$page_title = "Registrar"; 
include (__DIR__ . "/components/header.php");
?>

<body>
    <h2>Registar Usuario </h2>
    <form method="post" action="../actions/usuario/Create.php">

    <input name="id" type="hidden">
    <label>Endereço de Email</label>
    <input name="email" type="text"  id="email1">

    <label>Nome de Usuario</label>
    <input name="nomeUsu" type="text"  id="nomeUsu">

    <label>Data de Aniversário</label>
    <input name="niver" type="date"  id="niver">

    <label>Senha</label>
    <input name="senha" type="password"  id="senha">

    <button type="submit">Registar</button> 


    </form>


</body>

