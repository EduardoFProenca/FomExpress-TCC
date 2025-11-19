<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

require_once '../config/conexao.php';

$response = ['sucesso' => false, 'mensagem' => ''];

try {
    // Verifica se é POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método inválido.');
    }

    // Verifica se usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        throw new Exception('Você precisa estar logado para editar seu perfil.');
    }

    // Captura dados do formulário
    $idUsuario = intval($_POST['id_usuario'] ?? 0);
    $novoNome = trim($_POST['nome'] ?? '');
    $novoEmail = trim($_POST['email'] ?? '');

    // Validações
    if (empty($novoNome) || empty($novoEmail)) {
        throw new Exception('Por favor, preencha todos os campos.');
    }

    // Valida o ID do usuário (segurança)
    if ($idUsuario !== $_SESSION['usuario_id']) {
        throw new Exception('Acesso negado.');
    }

    // Valida formato do email
    if (!filter_var($novoEmail, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Por favor, insira um e-mail válido.');
    }

    // Verifica se o email já está em uso por outro usuário
    $stmt = $conn->prepare('SELECT idUsuario FROM usuario WHERE email = ? AND idUsuario != ?');
    $stmt->bind_param('si', $novoEmail, $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        throw new Exception('Este e-mail já está cadastrado por outro usuário.');
    }
    $stmt->close();

    // Atualiza os dados no banco
    $stmt = $conn->prepare('UPDATE usuario SET nome = ?, email = ? WHERE idUsuario = ?');
    $stmt->bind_param('ssi', $novoNome, $novoEmail, $idUsuario);
    
    if (!$stmt->execute()) {
        throw new Exception('Erro ao atualizar perfil: ' . $stmt->error);
    }
    
    $stmt->close();

    // Atualiza a sessão
    $_SESSION['usuario_nome'] = $novoNome;
    $_SESSION['usuario_email'] = $novoEmail;

    // Resposta de sucesso
    $response['sucesso'] = true;
    $response['mensagem'] = 'Perfil atualizado com sucesso!';
    $response['novo_nome'] = $novoNome;
    $response['novo_email'] = $novoEmail;

} catch (Exception $e) {
    $response['mensagem'] = $e->getMessage();
}

echo json_encode($response);
?>