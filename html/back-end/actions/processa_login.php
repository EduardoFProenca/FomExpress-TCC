<?php
session_start();
require_once '../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];

    $sql = "SELECT idUsuario, nome, senha FROM Usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        
        if (password_verify($senha_digitada, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['idUsuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            header("Location: ../login.php?erro=1");
            exit();
        }
    } else {
        header("Location: ../login.php?erro=1");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>