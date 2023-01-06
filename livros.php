<?php

include 'header.php';
include 'connBd.php';

?>


<?php

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

<button type="submit">
    <a href="index.php" style="text-decoration: none;">voltar para a pagina principal</a>
</button>

