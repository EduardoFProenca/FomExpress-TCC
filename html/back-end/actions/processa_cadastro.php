<?php
require_once '../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO Usuario (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);

    if ($stmt->execute()) {
        echo "<h1>Cadastro realizado com sucesso!</h1>";
        echo '<a href="../cadastro.php">Voltar para o cadastro</a>';
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>