<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>FomExpress - Cadastro</title>
</head>
<body>
    <h1>Crie sua Conta no FomExpress</h1>
    <form action="actions/processa_cadastro.php" method="POST">
        <p>Nome Completo: <input type="text" name="nome" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Senha: <input type="password" name="senha" required></p>
        <p>Telefone: <input type="text" name="telefone"></p>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>