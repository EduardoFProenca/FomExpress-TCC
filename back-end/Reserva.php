<?php
header('Content-Type: application/json; charset=utf-8');

// Configurações de conexão
$servidor = "localhost";
$usuario  = "root";
$senha    = ""; // Coloque sua senha do MySQL se tiver
$banco    = "fomexpress_db";

// Array de resposta
$response = array();

try {
    // Conectar ao banco
    $conn = new mysqli($servidor, $usuario, $senha, $banco);
    
    if ($conn->connect_error) {
        throw new Exception("Erro na conexão: " . $conn->connect_error);
    }
    
    // Capturar os dados do formulário
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $primeiro_nome = trim($_POST['primeiro_nome'] ?? '');
        $ultimo_nome   = trim($_POST['ultimo_nome'] ?? '');
        $email         = trim($_POST['email'] ?? '');
        $qtd_pessoas   = trim($_POST['qtd_pessoas'] ?? '');
        
        // Validação
        if (empty($primeiro_nome) || empty($ultimo_nome) || empty($email) || empty($qtd_pessoas)) {
            $response['sucesso'] = false;
            $response['mensagem'] = 'Por favor, preencha todos os campos obrigatórios.';
            echo json_encode($response);
            exit();
        }
        
        // Validar email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['sucesso'] = false;
            $response['mensagem'] = 'Por favor, insira um e-mail válido.';
            echo json_encode($response);
            exit();
        }
        
        // Junta o nome completo
        $nome_completo = $primeiro_nome . " " . $ultimo_nome;
        
        // Prepara a query SQL
        $sql = "INSERT INTO reserva (nome, email, qtd_pessoas) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Erro ao preparar consulta: " . $conn->error);
        }
        
        $stmt->bind_param("ssi", $nome_completo, $email, $qtd_pessoas);
        
        // Executa
        if ($stmt->execute()) {
            $response['sucesso'] = true;
            $response['mensagem'] = "Reserva realizada com sucesso! Em breve entraremos em contato no e-mail <strong>$email</strong>.";
        } else {
            throw new Exception("Erro ao registrar reserva: " . $stmt->error);
        }
        
        $stmt->close();
        $conn->close();
        
    } else {
        $response['sucesso'] = false;
        $response['mensagem'] = 'Método de requisição inválido.';
    }
    
} catch (Exception $e) {
    $response['sucesso'] = false;
    $response['mensagem'] = 'Erro: ' . $e->getMessage();
}

echo json_encode($response);
?>