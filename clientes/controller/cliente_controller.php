<?php
include '../../connection/connBd.php';
?>


<?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 

if(!empty($dados['SendCadUsuario'])){


    $query_cliente = "INSERT INTO clientes (nome, cpf, compra_id , livro_id, created) 
            VALUES (:nome, :cpf, :compra_id, :livro_id, NOW())";
            $cad_cliente = $conn->prepare($query_cliente);
            $cad_cliente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cad_cliente->bindParam(':cpf', $dados['cpf'], PDO::PARAM_INT);
            $cad_cliente->bindParam(':compra_id', $dados['compra_id'], PDO::PARAM_INT);
            $cad_cliente->bindParam(':livro_id', $dados['livro_id'], PDO::PARAM_INT);

            $cad_cliente->execute();

            if($cad_cliente->rowCount()){
                echo "Usuário cadastrado com sucesso!<br>";
            }else{
                echo "Erro: Usuário não cadastrado com sucesso!<br>";
            }
}

?>