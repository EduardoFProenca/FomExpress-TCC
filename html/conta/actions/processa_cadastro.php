<?php
// ATIVAR EXIBIÇÃO DE ERROS (para debug)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    echo "Processando cadastro...<br>";
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    
    echo "Dados recebidos: Nome: $nome, Email: $email<br>";

    $sql = "INSERT INTO Usuario (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Erro na preparação: " . $conn->error);
    }
    
    $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);

    if ($stmt->execute()) {
        //echo "Cadastro realizado! Redirecionando...<br>";
         header("Location: ../login.php?cadastro=sucesso");
        exit();
    } else {
        echo "<h1>Erro ao cadastrar</h1>";
        echo "<p>" . $stmt->error . "</p>";
        echo '<a href="../cadastro.php">Tentar novamente</a>';
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "Método não é POST!";
}
?>