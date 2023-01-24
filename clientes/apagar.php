<?php
session_start();

include_once "connBd.php";

$id_usuario = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

if ($id_usuario) {
    try {
        $query_usuario = "DELETE FROM clientes WHERE id=:id LIMIT 1";
        $apagar_usuario = $conn->prepare($query_usuario);
        $apagar_usuario->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        if ($apagar_usuario->execute()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário apagado com sucesso!</p>";
            header("Location:listar.php");
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso!</p>";
            header("Location: listar.php");
        }
    } catch (PDOException $erro) {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso!</p>";
        //$_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso. Erro gerado: " . $erro->getMessage() . " </p>";
        header("Location: listar.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: listar.php");
}

?>
