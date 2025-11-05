<?php
session_start();

// Verificar se o usuário está logado
$isUserLoggedIn = isset($_SESSION['usuario_id']);
$nomeUsuario = $isUserLoggedIn ? $_SESSION['usuario_nome'] : '';
$emailUsuario = $isUserLoggedIn ? ($_SESSION['usuario_email'] ?? '') : ''; 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../img/logo/Logo-Fomexpress.png" type="image/x-icon">
</head>

<body>

    <header class="header">
        <!-- Localização do logo, precisa estar igual em todas as páginas-->
        <div class="logo">
            <img src="../img/logo/Logo-Fomexpress.png" />
        </div>
        <br>

        <nav class="nav">

            <input type="checkbox" id="checkbox" class="checkbox" />
            <label for="checkbox" class="label-menu">
                Menu
                <span class="btnhamburger"></span>
            </label>

            <ul class="menu">
                <li><a href="home.php"> Home </a></li>
                <li><a href="cardapio.html"> Cardápio </a></li>
                <li><a href="quemsomos.html"> Quem somos </a></li>
                <li><a href="espaco.html"> Nosso espaço </a></li>
            </ul>
            
            <!-- Perfil do usuário -->
            <li class="user-profile">
                <div class="user-circle" id="userCircle">
                    <i class="fa fa-user"></i>
                </div>
                
                <!-- DROPDOWN PARA USUÁRIO NÃO LOGADO -->
                <div class="user-dropdown" id="userDropdownGuest" style="<?php echo !$isUserLoggedIn ? 'display: block;' : 'display: none;'; ?>">
                    <div class="dropdown-header">
                        <p>Bem-vindo!</p>
                        <span>Faça login ou cadastre-se</span>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="../conta/login.php"><i class="fa fa-sign-in"></i> Entrar</a></li>
                        <li><a href="../conta/cadastro.php"><i class="fa fa-user-plus"></i> Cadastrar</a></li>
                    </ul>
                </div>
                
                <!-- DROPDOWN PARA USUÁRIO LOGADO -->
                <div class="user-dropdown" id="userDropdownLogged" style="<?php echo $isUserLoggedIn ? 'display: block;' : 'display: none;'; ?>">
                    <div class="dropdown-header">
                        <p><?php echo htmlspecialchars($nomeUsuario); ?></p>
                        <span><?php echo htmlspecialchars($emailUsuario); ?></span>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="../conta/index.php"><i class="fa fa-user"></i> Minha Conta</a></li>
                        <li><a href="#"><i class="fa fa-history"></i> Histórico</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a href="../conta/actions/logout.php" id="btnLogout"><i class="fa fa-sign-out"></i> Sair</a></li>
                    </ul>
                </div>
            </li>
        </nav>

    </header>

    <section class="home" id="home">

        <div class="texto-home">

            <P class="p1"> Bem-vindos ao<b> FomExpress</b>!</P>
            <h3>Qualidade para quem tem pressa</h3>
            <p class="p2"> Equilíbrio com a qualidade que sua rotina precisa!
            </p><br>

            <div class="redes-home">
                <a href=""> <i class="fa fa-facebook"> </i> </a>
                <a href=""> <i class="fa fa-instagram"> </i> </a>
                <a href=""> <i class="fa fa-whatsapp"> </i> </a>
                <a href=""> <i class="fa fa-map"> </i> </a>
            </div>

            <div id="btn-reserva"> <a href="espaco.html#link_reserva"> <b>Fazer Reserva</b> </a> </div>

        </div>

        <div class="img-home">
            <img src="../img/backgrounds/comida/Home.jpg" alt="John" style="width:100%">
        </div>

        <div class="empurra"></div>

    </section>

    <div class="footer">

        <ul>
            <li><a href="quemsomos.html#link_trabconosco"> Trabalhe Conosco </a></li>
            <li><a href="espaco.html#link_mapa"> Localização </a></li>
            <li><a href="espaco.html#link_duvidas"> Dúvidas </a></li>
        </ul>

        <p class="copyright">
           FomExpress Restaurante © 2025
        </p>
    </div>

<script>
    const userCircle = document.getElementById('userCircle');
    const userDropdownGuest = document.getElementById('userDropdownGuest');
    const userDropdownLogged = document.getElementById('userDropdownLogged');
    
    // VERIFICAR SE O USUÁRIO ESTÁ LOGADO (vindo do PHP)
    let isUserLoggedIn = <?php echo $isUserLoggedIn ? 'true' : 'false'; ?>;
    
    // Toggle do dropdown ao clicar no círculo
    userCircle.addEventListener('click', function(e) {
        e.stopPropagation();
        
        if (isUserLoggedIn) {
            userDropdownLogged.classList.toggle('active');
            userDropdownGuest.classList.remove('active');
        } else {
            userDropdownGuest.classList.toggle('active');
            userDropdownLogged.classList.remove('active');
        }
    });
    
    // Desktop: Fechar dropdown ao clicar fora
    const isMobile = window.innerWidth <= 969;
    if (!isMobile) {
        document.addEventListener('click', function(e) {
            if (!userCircle.contains(e.target) && 
                !userDropdownGuest.contains(e.target) && 
                !userDropdownLogged.contains(e.target)) {
                userDropdownGuest.classList.remove('active');
                userDropdownLogged.classList.remove('active');
            }
        });
    }
    
    // Atualizar comportamento ao redimensionar
    window.addEventListener('resize', function() {
        if (window.innerWidth <= 969) {
            userDropdownGuest.classList.remove('active');
            userDropdownLogged.classList.remove('active');
        }
    });
</script>
</body>

</html>