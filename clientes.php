<?php
include 'header.php';
include 'connBd.php';
?>



<div class="container">


<?php

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

?>

<br/>

<button type="submit">
    <a href="index.php" style="text-decoration: none;">voltar para a pagina principal</a>
</button>



</div>

