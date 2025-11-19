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

            <!-- Ícone do usuário -->
            <div class="user-profile">
                <div class="user-circle" id="userCircle">
                    <i class="fa fa-user"></i>
                </div>

                <!-- Dropdown visitante -->
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
                    <!-- Dropdown logado -->
                    <div class="user-dropdown" id="userDropdownLogged">
                        <div class="dropdown-header">
                            <p><?= $nomeUsuario ?></p>
                            <span><?= $emailUsuario ?></span>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="abrirModalEditarPerfil(); return false;"><i class="fa fa-edit"></i> Editar Perfil</a></li>
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

    <!-- Conteúdo principal -->
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

    <!-- ===== MODAL EDITAR PERFIL ===== -->
    <?php if ($isUserLoggedIn): ?>
    <div id="modalEditarPerfil" class="modal-editar-perfil">
        <div class="modal-conteudo-editar">
            <div class="modal-header-editar">
                <h3><i class="fa fa-user-circle"></i> Editar Perfil</h3>
                <button class="fechar-modal-editar" onclick="fecharModalEditarPerfil()">&times;</button>
            </div>
            
            <div class="modal-body-editar">
                <!-- Mensagem de feedback -->
                <div id="mensagemEditarPerfil" style="display: none; margin-bottom: 20px;">
                    <div class="alert" role="alert" id="alertEditarPerfil">
                        <span id="textoMensagemEditar"></span>
                    </div>
                </div>

                <form id="formEditarPerfil">
                    <div class="input-box-editar">
                        <label for="editNome"><i class="fa fa-user"></i> Nome Completo</label>
                        <input type="text" id="editNome" name="nome" value="<?= $nomeUsuario ?>" required>
                    </div>

                    <div class="input-box-editar">
                        <label for="editEmail"><i class="fa fa-envelope"></i> E-mail</label>
                        <input type="email" id="editEmail" name="email" value="<?= $emailUsuario ?>" required>
                    </div>

                    <div class="botoes-modal-editar">
                        <button type="button" class="btn-cancelar-editar" onclick="fecharModalEditarPerfil()">
                            Cancelar
                        </button>
                        <button type="submit" class="btn-salvar-editar" id="btnSalvarPerfil">
                            <i class="fa fa-check"></i> Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script>
        /* ========================================= */
        /* TOGGLE DROPDOWN DO USUÁRIO                */
        /* ========================================= */
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

        // Fechar dropdown ao clicar fora
        document.addEventListener('click', e => {
            if (!e.target.closest('.user-profile')) {
                userDropdownGuest?.classList.remove('active');
                userDropdownLogged?.classList.remove('active');
            }
        });

        /* ========================================= */
        /* MODAL EDITAR PERFIL                       */
        /* ========================================= */
        function abrirModalEditarPerfil() {
            document.getElementById('modalEditarPerfil').style.display = 'block';
            document.getElementById('mensagemEditarPerfil').style.display = 'none';
            userDropdownLogged?.classList.remove('active');
        }

        function fecharModalEditarPerfil() {
            document.getElementById('modalEditarPerfil').style.display = 'none';
        }

        // Fechar modal clicando fora
        window.onclick = function(event) {
            const modal = document.getElementById('modalEditarPerfil');
            if (event.target === modal) {
                fecharModalEditarPerfil();
            }
        }

        /* ========================================= */
        /* PROCESSAR EDIÇÃO DO PERFIL (AJAX)         */
        /* ========================================= */
        document.getElementById('formEditarPerfil')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btnSalvar = document.getElementById('btnSalvarPerfil');
            const mensagemDiv = document.getElementById('mensagemEditarPerfil');
            const alertDiv = document.getElementById('alertEditarPerfil');
            const textoMensagem = document.getElementById('textoMensagemEditar');
            
            // Visual feedback
            btnSalvar.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Salvando...';
            btnSalvar.disabled = true;
            mensagemDiv.style.display = 'none';
            
            // Dados do formulário
            const formData = new FormData(this);
            formData.append('id_usuario', <?= $idUsuario ?>);
            
            // Envia via AJAX
            fetch('../conta/actions/editar_perfil.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                mensagemDiv.style.display = 'block';
                
                if (data.sucesso) {
                    alertDiv.className = 'alert alert-success';
                    textoMensagem.innerHTML = '✅ ' + data.mensagem;
                    
                    // Atualizar informações no dropdown
                    document.querySelector('.dropdown-header p').textContent = data.novo_nome;
                    document.querySelector('.dropdown-header span').textContent = data.novo_email;
                    
                    // Atualizar campos do formulário
                    document.getElementById('editNome').value = data.novo_nome;
                    document.getElementById('editEmail').value = data.novo_email;
                    
                    // Fechar modal após 2 segundos
                    setTimeout(() => {
                        fecharModalEditarPerfil();
                    }, 2000);
                } else {
                    alertDiv.className = 'alert alert-danger';
                    textoMensagem.innerHTML = '❌ ' + data.mensagem;
                }
                
                btnSalvar.innerHTML = '<i class="fa fa-check"></i> Salvar Alterações';
                btnSalvar.disabled = false;
            })
            .catch(error => {
                mensagemDiv.style.display = 'block';
                alertDiv.className = 'alert alert-danger';
                textoMensagem.innerHTML = '❌ Erro ao salvar. Tente novamente.';
                
                btnSalvar.innerHTML = '<i class="fa fa-check"></i> Salvar Alterações';
                btnSalvar.disabled = false;
                
                console.error('Erro:', error);
            });
        });

        /* ========================================= */
        /* EXCLUIR CONTA                             */
        /* ========================================= */
        function confirmarExclusaoConta() {
            if (!confirm('⚠️ ATENÇÃO!\n\nVocê tem certeza que deseja EXCLUIR sua conta?\n\n❌ Esta ação é IRREVERSÍVEL!\n❌ Todos os seus dados serão PERMANENTEMENTE apagados!\n\nDeseja continuar?')) {
                return;
            }
            
            const texto = prompt('Digite "CONFIRMAR" em letras maiúsculas para excluir sua conta:');
            
            if (texto !== 'CONFIRMAR') {
                alert('❌ Exclusão cancelada. Texto incorreto.');
                return;
            }

            fetch('../conta/actions/excluir_conta.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id_usuario: <?= $idUsuario ?> })
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    alert('✅ ' + data.mensagem);
                    window.location.href = '../conta/login.php';
                } else {
                    alert('❌ ' + data.mensagem);
                }
            })
            .catch(error => {
                alert('❌ Erro ao excluir conta. Tente novamente.');
                console.error('Erro:', error);
            });
        }
    </script>

</body>
</html>