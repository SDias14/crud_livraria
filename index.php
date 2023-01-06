<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Livraria - CRUD SELECT</title>
</head>
<body>

  <div class="container">






<?php
//inicio da conexao com o banco de dados utilizando pdo
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "livraria";
$port = 3306;

try{
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    
    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}

//fim da conexao com o banco de dados utilizando pd

echo "<h2>listar clientes</h2>";

echo"<hr><br>";


    // retornando apenas a coluna que quero do banco de dados. 

    $query_cliente = "SELECT id,nome,cpf,compra_id,livro_id,created,modified FROM clientes";
    $result_cliente= $conn->prepare($query_cliente);
    $result_cliente->execute();

    while($row_cliente = $result_cliente->fetch(PDO::FETCH_ASSOC)){ 
        
        extract($row_cliente); // extrai as colunas de dentro do row_usuarios

        //tabela


        echo "<table>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>CPF</th>";
        echo "<th>Compra</th>";

        echo "<th>Livro</th>";

        echo "<th>Created</th>";

        echo "<th>Modified</th>";

       

        echo "</tr>";


        echo "<tr>";
        echo "<td>". $id. "</td>";

        echo "<td>". $nome. "</td>";

        echo "<td>". $cpf. "</td>";

        echo "<td>". $compra_id. "</td>";

        echo "<td>". $livro_id. "</td>";
        
        echo "<td>". $created. "</td>";

        echo "<td>". $modified. "</td>";

    




        echo "</tr>";

        echo "</table>";


  
    
}

// puxando o titulo dos livros

echo"<hr><br>";


echo "<h2>Titulos dos livros</h2>";

echo"<hr><br>";

    $query_livro = "SELECT id,nome,autor FROM livros";
    $result_livros= $conn->prepare($query_livro);
    $result_livros->execute();


while ($row_livro = $result_livros->fetch(PDO::FETCH_ASSOC)) {

    extract($row_livro);


    echo "<table>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Autor</th>";
    echo "<tr>";

    echo "<td>" . $id . "</td>";

    echo "<td>" . $nome . "</td>";

    echo "<td>" . $autor . "</td>";

    echo "</tr>";

    echo "</table>";

    echo "<br>";

}




       




?>



</div>


</body>
</html>