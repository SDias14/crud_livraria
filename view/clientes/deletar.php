<?php
session_start();


include '../../model/connBd.php';





$id_usuario = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

if ($id_usuario) {
    try {
        $query_cliente = "DELETE FROM clientes WHERE id=:id LIMIT 1";
        $apagar_cliente = $conn->prepare($query_clientes);
        $apagar_cliente->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        if ($apagar_usuario->execute()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário apagado com sucesso!</p>";
            header("Location: clientes.php");
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso!</p>";
            header("Location: clientes.php");
        }
    } catch (PDOException $erro) {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Cliente não apagado com sucesso!</p>";
        //$_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso. Erro gerado: " . $erro->getMessage() . " </p>";
        header("Location: clientes.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: clientes.php");
}

?>