<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/conexao.php';

echo "<h2>Criando Tabela Usuario...</h2>";

$sql = "CREATE TABLE IF NOT EXISTS Usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    dataCadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "✅ Tabela 'Usuario' criada com sucesso!<br>";
    echo "<a href='teste_conexao.php'>Testar novamente</a><br>";
    echo "<a href='cadastro.php'>Ir para cadastro</a>";
} else {
    echo "❌ Erro ao criar tabela: " . $conn->error;
}

$conn->close();
?>