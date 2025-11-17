<?php
session_start();
$isUserLoggedIn = isset($_SESSION['usuario_id']);
$nomeUsuario    = $isUserLoggedIn ? htmlspecialchars($_SESSION['usuario_nome']  ?? '') : '';
$emailUsuario   = $isUserLoggedIn ? htmlspecialchars($_SESSION['usuario_email'] ?? '') : '';
$idUsuario      = $isUserLoggedIn ? (int)$_SESSION['usuario_id'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Home - FomExpress</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../img/logo/Logo-Fomexpress.png" type="image/x-icon" />

    <style>
        #modalEditarPerfil {
            display: none !important;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="logo">
            <img src="../img/logo/Logo-Fomexpress.png" alt="Logo FomExpress" />
        </div>
        <br>

        <nav class="nav">
            <input type="checkbox" id="checkbox" class="checkbox" />
            <label for="checkbox" class="label-menu">
                Menu
                <span class="btnhamburger"></span>
            </label>

            <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="cardapio.html">Cardápio</a></li>
                <li><a href="quemsomos.html">Quem somos</a></li>
                <li><a href="espaco.html">Nosso espaço</a></li>
            </ul>

            <div class="user-profile">
                <div class="user-circle" id="userCircle">
                    <i class="fa fa-user"></i>
                </div>

                <?php if (!$isUserLoggedIn): ?>
                    <div class="user-dropdown" id="userDropdownGuest">
                        <div class="dropdown-header">
                            <p>Bem-vindo!</p>
                            <span>Faça login ou cadastre-se</span>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="../conta/login.php"><i class="fa fa-sign-in"></i> Entrar</a></li>
                            <li><a href="../conta/cadastro.php"><i class="fa fa-user-plus"></i> Cadastrar</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="user-dropdown" id="userDropdownLogged">
                        <div class="dropdown-header">
                            <p><?= $nomeUsuario ?></p>
                            <span><?= $emailUsuario ?></span>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="btnAbrirModal"><i class="fa fa-pencil"></i> Editar Perfil</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="#" onclick="confirmarExclusaoConta(); return false;" style="color:#ff4444;"><i class="fa fa-trash"></i> Excluir Conta</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="../conta/actions/logout.php"><i class="fa fa-sign-out"></i> Sair</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <?php if ($isUserLoggedIn) include 'editar_perfil.php'; ?>

    <section class="home" id="home">
        <div class="texto-home">
            <p class="p1">Bem-vindos ao <b>FomExpress</b>!</p>
            <h3>Qualidade para quem tem pressa</h3>
            <p class="p2">Equilíbrio com a qualidade que sua rotina precisa!</p><br>

            <div class="redes-home">
                <a href="https://www.facebook.com/people/FomExpress-Restaurante/61583397555803" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/restaurante.fomexpress" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://api.whatsapp.com/send/?phone=5581996604155" target="_blank"><i class="fa fa-whatsapp"></i></a>
                <a href="espaco.html#link_mapa"><i class="fa fa-map"></i></a>
            </div>

            <div id="btn-reserva"><a href="espaco.html#link_reserva"><b>Fazer Reserva</b></a></div>
        </div>

        <div class="img-home">
            <img src="../img/backgrounds/comida/Home.jpg" alt="Comida deliciosa" style="width:100%" />
        </div>

        <div class="empurra"></div>
    </section>

    <footer class="footer">
        <ul>
            <li><a href="quemsomos.html#link_trabconosco">Trabalhe Conosco</a></li>
            <li><a href="espaco.html#link_mapa">Localização</a></li>
            <li><a href="espaco.html#link_duvidas">Dúvidas</a></li>
        </ul>
        <p class="copyright">FomExpress Restaurante © 2025</p>
    </footer>

    <script>
        /* ---------- toggle dropdown ---------- */
        const userCircle = document.getElementById('userCircle');
        const userDropdownGuest = document.getElementById('userDropdownGuest');
        const userDropdownLogged = document.getElementById('userDropdownLogged');
        const isUserLoggedInJS = <?= $isUserLoggedIn ? 'true' : 'false' ?>;

        userCircle?.addEventListener('click', e => {
            e.stopPropagation();
            if (isUserLoggedInJS) {
                userDropdownLogged.classList.toggle('active');
                userDropdownGuest?.classList.remove('active');
            } else {
                userDropdownGuest.classList.toggle('active');
                userDropdownLogged?.classList.remove('active');
            }
        });

        document.addEventListener('click', e => {
            if (!e.target.closest('.user-profile')) {
                userDropdownGuest?.classList.remove('active');
                userDropdownLogged?.classList.remove('active');
            }
        });

        /* ---------- modal ---------- */
        function abrirModalEditarPerfil() {
            document.getElementById('modalEditarPerfil').style.display = 'block';
            userDropdownLogged.classList.remove('active');
        }

        function fecharModalEditarPerfil() {
            const m = document.getElementById('modalEditarPerfil');
            m.style.display = 'none';
            document.getElementById('formEditarPerfil').reset();
            document.getElementById('mensagemEditar').style.display = 'none';
        }

        window.addEventListener('click', e => {
            const m = document.getElementById('modalEditarPerfil');
            if (e.target === m) fecharModalEditarPerfil();
        });

        /* ---------- submit ---------- */
        document.getElementById('formEditarPerfil')?.addEventListener('submit', e => {
            e.preventDefault();
            const btn = document.getElementById('btnSalvarEditar');
            btn.innerHTML = '⏳ Salvando...';
            btn.disabled = true;

            fetch('../conta/actions/editar_perfil.php', {
                    method: 'POST',
                    body: new FormData(e.target)
                })
                .then(r => r.json())
                .then(data => {
                    const box = document.getElementById('mensagemEditar');
                    const txt = document.getElementById('textoMensagemEditar');
                    box.style.display = 'block';
                    document.getElementById('alertEditar').className = data.sucesso ? 'alert alert-success' : 'alert alert-danger';
                    txt.textContent = (data.sucesso ? '✅ ' : '❌ ') + data.mensagem;
                    if (data.sucesso) setTimeout(() => location.reload(), 2000);
                    else {
                        btn.innerHTML = '💾 Salvar Alterações';
                        btn.disabled = false;
                    }
                })
                .catch(() => {
                    alert('❌ Erro ao salvar.');
                    btn.innerHTML = '💾 Salvar Alterações';
                    btn.disabled = false;
                });
        });
        document.getElementById('btnAbrirModal')?.addEventListener('click', e => {
    e.preventDefault();           // evita #
    abrirModalEditarPerfil();     // sua função já existe
});
        /* ---------- exclusão ---------- */
        function confirmarExclusaoConta() {
            if (!confirm('⚠️ ATENÇÃO!\n\nVocê tem certeza que deseja EXCLUIR sua conta?\n\n❌ Esta ação é IRREVERSÍVEL!\n❌ Todos os seus dados serão PERMANENTEMENTE apagados!\n\nDigite "CONFIRMAR" para prosseguir:')) return;
            const texto = prompt('Digite "CONFIRMAR" em letras maiúsculas para excluir sua conta:');
            if (texto !== 'CONFIRMAR') return alert('❌ Exclusão cancelada. Texto incorreto.');

            fetch('../conta/actions/excluir_conta.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_usuario: <?= $idUsuario ?>
                    })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.sucesso) {
                        alert('✅ ' + data.mensagem);
                        window.location.href = '../conta/login.php';
                    } else alert('❌ ' + data.mensagem);
                })
                .catch(() => alert('❌ Erro ao excluir conta. Tente novamente.'));
        }
    </script>

</body>

</html>