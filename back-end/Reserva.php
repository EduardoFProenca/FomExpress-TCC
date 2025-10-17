<?php
// configurações de conexão
$servidor = "localhost";
$usuario  = "root";
$senha    = "root"; // deixe vazio se o MySQL não tem senha
$banco    = "dbfomexpress";

// conectar ao banco
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// verificar erro na conexão
if ($conn->connect_error) {
    die("<h3>Erro na conexão com o banco de dados: " . $conn->connect_error . "</h3>");
}

// capturar os dados do formulário (via método POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $primeiro_nome = trim($_POST['primeiro_nome'] ?? '');
    $ultimo_nome   = trim($_POST['ultimo_nome'] ?? '');
    $email         = trim($_POST['email'] ?? '');
    $qtd_pessoas   = trim($_POST['qtd_pessoas'] ?? '');

    // verifica se todos os campos estão preenchidos
    if (empty($primeiro_nome) || empty($ultimo_nome) || empty($email) || empty($qtd_pessoas)) {
        die("<h3>Por favor, preencha todos os campos obrigatórios.</h3>");
    }

    // junta o primeiro e último nome
    $nome_completo = $primeiro_nome . " " . $ultimo_nome;

    // prepara a query SQL
    $sql = "INSERT INTO reserva (nome, email, qtd_pessoas) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("<h3>Erro ao preparar a consulta: " . $conn->error . "</h3>");
    }

    $stmt->bind_param("ssi", $nome_completo, $email, $qtd_pessoas);

    // executa e verifica
    if ($stmt->execute()) {
        echo "<h3>Reserva registrada com sucesso!</h3>";
        echo "<p>Obrigado, <strong>$nome_completo</strong>. Em breve entraremos em contato pelo e-mail <strong>$email</strong>.</p>";
    } else {
        echo "<h3>Erro ao registrar a reserva: " . $stmt->error . "</h3>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h3>Método inválido. Envie o formulário corretamente.</h3>";
}
