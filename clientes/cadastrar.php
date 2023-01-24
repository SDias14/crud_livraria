<?php
session_start();
include_once "./connBd.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Cadastra Usuario</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Cadastrar Usuário</h2>
    
    
    <?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 



if (!empty($dados['SendCadCliente'])) {
  //var_dump($dados);

  try {
    

    $query_cliente = "INSERT INTO clientes (nome, cpf, email, senha, created) 
            VALUES (:nome, :cpf, :email, :senha, NOW())";
            $cad_cliente = $conn->prepare($query_cliente);
            $cad_cliente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cad_cliente->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $cad_cliente->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $cad_cliente->bindParam(':senha', $senha_cript);
           

            $cad_cliente->execute();

            

            if ($cad_cliente->rowCount()) {
              $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
              unset($dados);
              header("Location: ../index.php");
          } else {
              echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
          }
      } catch (PDOException $erro) {
          echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
          //echo "Erro: Usuário não cadastrado com sucesso. Erro gerado: " . $erro->getMessage() . " <br>";
      }
  }

  ?>



    <div class="container">


<form method="POST" action="">



<div class="form-group">
<label>Nome Completo</label>
 <input type="text" class="form-control" name="nome" placeholder="Nome completo" required/>
</div>

<div class="form-group">
  <label>CPF</label>
 <input type="number" class="form-control"  name="cpf" placeholder="Digite o cpf" required>
 </div>


   <div class="form-group">
<label>E-mail: </label>
 <input type="email" class="form-control" name="email" placeholder="Melhor e-mail do usuário" required />
 </div>

<div class="form-group">
 <label>Senha: </label>
 <input type="password" class="form-control" name="senha" placeholder="Senha do usuário" required />
</div>
   
<br>

 <input type="submit" value="Cadastrar" name="SendCadCliente"  class="btn btn-outline-info"></input>

</div>

 </form>

</body>

</html>