<?php
session_start();
include_once "./connBd.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Formulario UPDATE</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Editar Usuário</h2>
    <?php


//Salvar as informações do usuário no banco de dados 
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['SendUpCliente'])) {
    //var_dump($dados);
    try {
        $query_up_cliente = "UPDATE clientes 
                    SET nome=:nome, cpf=:cpf, email=:email, modified = NOW()
                    WHERE id=:id";
        $up_cliente = $conn->prepare($query_up_cliente);
        $up_cliente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $up_cliente->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
        $up_cliente->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $up_cliente->bindParam(':id', $dados['id'], PDO::PARAM_INT);



          if ($up_cliente->execute()) { 
                ?>
               <div class="text-center">cliente cadastrado com sucesso</div>
                <?php

            } else {
                ?>
                <h1>cliente nao cadastrado com sucesso</h1>
                <?php
            } 
            
        } catch (PDOException $erro) {
            echo "Erro: Cliente não editado com sucesso!";
            //echo "Erro: Usuário não editado com sucesso. Erro gerando: " . $erro->getMessage() . " <br>";
        }
    }

   
    $id = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

    

    try{
        //Pesquisar as informações do usuário no banco de dados
        $query_cliente = "SELECT id, nome, cpf, email
        FROM clientes 
        WHERE id=:id 
        LIMIT 1";
        $result_cliente = $conn->prepare($query_cliente);
        $result_cliente->bindParam(':id', $id, PDO::PARAM_INT);
        $result_cliente->execute();

        $row_cliente = $result_cliente->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_cliente);
        

    } catch (PDOException $erro) {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: index.php");
        //echo "Erro: Usuário não encontrado. Erro gerando: " . $erro->getMessage() . " <br>";

    }


    ?>

    <form method="POST" action="">

    <?php
        $id = "";
        if (isset($row_cliente['id'])) {
            $id = $row_cliente['id'];
        }
        ?>
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" required>

        <?php
        $nome = "";
        if (isset($row_cliente['nome'])) {
            $nome = $row_cliente['nome'];
        }
        ?>
         <div class="form-group">
         <label>Nome Completo</label>
        
        <input type="text" class="form-control" name="nome" placeholder="Nome completo" value="<?php echo $nome; ?>" required><br><br>
         </div>

        <?php
        $cpf = "";
        if (isset($row_cliente['cpf'])) {
            $cpf = $row_cliente['cpf'];
        }
        ?>

        
         <div class="form-group">
         <label>CPF</label>
        <input type="text" class="form-control" name="cpf" placeholder="Digite o cpf" value="<?php echo $cpf; ?>" required><br><br>
         </div>


 <?php
        $email = "";
        if (isset($row_cliente['email'])) {
            $email = $row_cliente['email'];
        }
        ?>

        
         <div class="form-group">
         <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="O melhor e-mail do cliente" value="<?php echo $email; ?>" required><br><br>
         </div>

        <input type="submit" value="Save" name="SendUpCliente" class="btn btn-outline-info"><br><br>

        

    </form>
</body>

</html>