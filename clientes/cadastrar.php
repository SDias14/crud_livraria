<?php
session_start();
include_once "./connBd.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<!--link bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<title>Livraria Samuel Dias</title>
</head>

<body>


    
    
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

 <button class="btn btn-outline-info"><a href="../index.php" style="text-decoration: none;">Voltar</a></button>

</div>

 </form>

<!-- Footer -->
<footer class="bg-dark text-center text-white buttons">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
  
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example21" class="form-control" />
              <label class="form-label" for="form5Example21">Email address</label>
            </div>
          </div>
         

       

        
    </section>

  </div>


  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->


</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>


