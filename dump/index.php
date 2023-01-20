AS c
INNER JOIN livros AS l
ON c.livro_id = l.id
INNER JOIN 
compra AS comp
ON c.compra_id = comp.id



<?php
include_once "../../model/connBd.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Formulario com INSERT</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Cadastrar Usuário</h2>
    <?php

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
    
    if(!empty($dados['SendCadUsuario'])){
        

        $query_cliente = "INSERT INTO clientes (nome, cpf, email, senha, created) 
                VALUES (:nome, :cpf, :email, :senha, NOW())";
                $cad_cliente = $conn->prepare($query_cliente);
                $cad_cliente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_cliente->bindParam(':cpf', $dados['cpf'], PDO::PARAM_INT);
                $cad_cliente->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $cad_cliente->bindParam(':senha', $senha_cript);
               

                $cad_cliente->execute();

                if($cad_cliente->rowCount()){
                    echo "Usuário cadastrado com sucesso!<br>";
                }else{
                    echo "Erro: Usuário não cadastrado com sucesso!<br>";
                }
    }

    ?>
    <form method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" required /><br><br>

        <label>CPF: </label>
        <input type="text" name="cpf" placeholder="CPF" required /><br><br>


        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Melhor e-mail do usuário" required /><br><br>

        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Senha do usuário" required /><br><br>

      

        <input type="submit" value="Cadastra" name="SendCadUsuario" />
    </form>
</body>

</html>