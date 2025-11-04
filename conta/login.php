<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>FomExpress - Login</title>
</head>
<body>
    <h1>Acesse sua Conta</h1>

    <?php
        if (isset($_GET['erro'])) {
            echo '<p style="color:red;">Usuário ou senha inválidos!</p>';
        }
        if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso') {
            echo '<p style="color:green;">Cadastro realizado com sucesso! Faça seu login.</p>';
        }
    ?>

    <form action="actions/processa_login.php" method="POST">
        <p>Email: <input type="email" name="email" required></p>
        <p>Senha: <input type="password" name="senha" required></p>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>