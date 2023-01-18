<?php
include 'header.php';
include 'connBd.php';
?>



<div class="container">


<?php

echo "<h2>listar clientes</h2>";

echo"<hr><br>";


    // retornando apenas a coluna que quero do banco de dados. 

    $query_cliente = "SELECT c.id AS id_cliente, c.nome AS nome_cliente, c.cpf AS cpf_cliente, 
     l.nome AS nome_livro, comp.nome_compra AS nome_compra
     FROM clientes AS c
     INNER JOIN livros AS l
     ON c.livro_id = l.id
     INNER JOIN 
     compra AS comp
     ON c.compra_id = comp.id
     ";

    $result_cliente= $conn->prepare($query_cliente);
    $result_cliente->execute();

    while($row_client = $result_cliente->fetch(PDO::FETCH_ASSOC)){
        
        echo "ID: " . $row_client['id_cliente'] . "<br>";
        echo "Nome: ". $row_client['nome_cliente']. "<br>";
        echo "CPF: ". $row_client['cpf_cliente']. "<br>";
        echo "Nome da Compra : ". $row_client['nome_compra']. "<br>";
        echo "Nome do livro Comprado : ". $row_client['nome_livro']. "<br>";
        
        echo "<br>";
        echo "<hr>";
    }

  
    


?>

<br/>

<button type="submit">
    <a href="index.php" style="text-decoration: none;">voltar para a pagina principal</a>
</button>



</div>

