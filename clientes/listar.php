<?php

session_start();

include_once './connBd.php';

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

<div class="container-fluid">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php"> S & M</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./listar.php">Listar Clientes </a>
      </li>
      

      
     
    </ul>
   
  </div>
</nav>
            
        </div>



<div class="container">





 



      

<?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        $query_clientes = "SELECT id, nome, cpf, email FROM clientes ORDER BY id DESC";
        $result_clientes = $conn->prepare($query_clientes);
        $result_clientes->execute();

        if(($result_clientes) AND ($result_clientes-> rowCount() != 0))
{
	?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>CPF</th>
        <th>EMAIL DO CLIENTE</th>
        
		</tr>
		</thead>
		<tbody>
			<?php

        while($row_cliente = $result_clientes->fetch(PDO::FETCH_ASSOC)){ 
          extract($row_cliente);
          ?>
				<tr>
            
            <th><?php echo $id; ?></th>
            <td><?php echo $nome; ?></td>
            <td><?php echo $cpf; ?></td>
           <td><?php echo $email; ?></td>
           <td><?php echo  "<a href='./editar.php?id_usuario=$id'><button class='btn btn-danger'><span class=' glyphicon glyphicon-remove'>Editar</span></button></a>";?></td>
           <td><?php echo  "<a href='./apagar.php?id_usuario=$id'><button class='btn btn-danger'><span class=' glyphicon glyphicon-remove'>Excluir</span></button></a>";?></td>
           </tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usu??rio encontrado!</div>";
}


?>


        




</div>

<div class="text-center">

<button type="button" class="btn btn-outline-info"><a href="./cadastrar.php" style="text-decoration: none;">Cadastrar</a></button>


</div>





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
    ?? 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>



