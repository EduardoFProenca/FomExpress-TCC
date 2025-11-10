<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>FomExpress - Login</title>
    <link rel="stylesheet" href="../css/acessar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../img/logo/Logo-Fomexpress.png" alt="Logo FomExpress" />
        </div>

    <?php
    if (isset($_GET['erro'])) {
        echo '<p style="color:red;">Usuário ou senha inválidos!</p>';
    }
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso') {
        echo '<p style="color:green;">Cadastro realizado com sucesso! Faça seu login.</p>';
    }
    ?>
        <nav class="nav">
            <input type="checkbox" id="checkbox" class="checkbox" />
            <label for="checkbox" class="label-menu">
                Menu
                <span class="btnhamburger"></span>
            </label>

            <ul class="menu">
                <li><a href="../html/home.php">Home</a></li>
                <li><a href="../html/cardapio.html">Cardápio</a></li>
                <li><a href="../html/quemsomos.html">Quem somos</a></li>
                <li><a href="../html/espaco.html">Nosso espaço</a></li>
            </ul>
        </nav>
    </header>
    <main class="main-content">
        <div class="container">
            <form class="form" action="actions/processa_login.php" method="POST">
                <h1 class="title">Acesse sua Conta</h1>

                <?php
                    if (isset($_GET['erro'])) {
                        echo '<p style="color:red; text-align:center; font-weight:600;">Usuário ou senha inválidos!</p>';
                    }
                    if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso') {
                        echo '<p style="color:green; text-align:center; font-weight:600;">Cadastro realizado com sucesso! Faça seu login.</p>';
                    }
                ?>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <div class="enviar-button">
                    <button type="submit">Entrar</button>
                </div>

                <p style="text-align:center; margin-top:20px;">
                    Não tem uma conta? <a href="cadastro.php" style="color:#046f6f; font-weight:600;">Cadastre-se</a>
                </p>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="redes-footer">
            <a href="https://www.facebook.com/profile.php?id=100086796253137&mibextid=ZbWKwL" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://instagram.com/vegas.restaurante?igshid=YmMyMTA2M2Y=" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://wa.me/5581996604155" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>

    <ul class="lista-footer">
        <li><a href="../html/quemsomos.html#link_trabconosco">Trabalhe Conosco</a></li>
        <li><a href="../html/espaco.html#link_mapa">Localização</a></li>
        <li><a href="../html/espaco.html#link_duvidas">Dúvidas</a></li>
    </ul>
        <p class="copyright">
            &copy; FomExpress Restaurante © 2025
        </p>
    </footer>
</body>
</html>