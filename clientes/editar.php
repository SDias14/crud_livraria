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

    <div class="container">
       


    <h2 class = "text-center">Editar Usuário</h2>
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
               
               
                <?php
                $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
header("Location: ../index.php");
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
        header("Location: ..index.php");
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

    </div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>


