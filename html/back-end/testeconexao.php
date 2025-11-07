<?php
$servidor = "localhost";
$usuario = "root";
$senha = "root"; // coloque sua senha se tiver
$banco = "dbfomexpress";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("❌ Erro: " . $conn->connect_error);
}
echo "✅ Conexão bem-sucedida!";
$conn->close();
