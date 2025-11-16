<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>FomExpress - Cadastro</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="../img/logo/Logo-Fomexpress.png" type="image/x-icon">

</head>

<body>
    <header class="header">

    <div class="logo">
        <img src="../img/logo/Logo-Fomexpress.png" alt="Logo FomExpress" />
    </div>

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
            <form class="form" action="actions/processa_cadastro.php" method="POST">
                <h1 class="title">Crie sua Conta no FomExpress</h1>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>
                    </div>

                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                    </div>
                </div>

                <div class="enviar-button">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="redes-footer">
            <a href=" https://www.facebook.com/people/FomExpress-Restaurante/61583397555803" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/restaurante.fomexpress/?igsh=c2N3c3MzaXJrb2V6#" target="_blank">
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