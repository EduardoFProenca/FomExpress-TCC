<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao FomExpress</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($nome_usuario); ?>!</h1>
    <p>Você está na área principal do sistema FomExpress.</p>
    <p><a href="actions/logout.php">Sair (Logout)</a></p>
</body>
</html>