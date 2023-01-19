<?php
include_once '../controller/cliente_controller.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Cadastrar Novo usuario</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Cadastrar Usuário</h2>
  
    <form method="POST" action="../controller/cliente_controller.php">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" required /><br><br>

        <label>CPF: </label>
        <input type="number" name="cpf" placeholder="Cpf do Cliente" required /><br><br>

        
        <label>Identificação da compra </label> 
        <input type="number" name="compra_id" placeholder="Id da compra" required /><br><br>

        <label>Identificação do livro </label>
        <input type="number" name="livro_id" placeholder="Id do livro" required /><br><br>

        <input type="submit" value="Cadastrar" name="SendCadUsuario" />
    </form>
</body>

</html>