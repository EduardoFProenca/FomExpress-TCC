<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

require_once '../config/conexao.php';

$response = ['sucesso' => false, 'mensagem' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método inválido.');
    }

    if (!isset($_SESSION['usuario_id'])) {
        throw new Exception('Você precisa estar logado para excluir sua conta.');
    }

    $entrada = json_decode(file_get_contents('php://input'), true);
    $idUser  = intval($entrada['id_usuario'] ?? 0);

    if ($idUser !== $_SESSION['usuario_id']) {
        throw new Exception('Acesso negado.');
    }

    /* ---------- verifica existência ---------- */
    $sql = 'SELECT idUsuario FROM usuario WHERE idUsuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    if ($stmt->get_result()->num_rows === 0) {
        throw new Exception('Usuário não encontrado.');
    }
    $stmt->close();

    /* ---------- exclusão ---------- */
    $sql = 'DELETE FROM usuario WHERE idUsuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idUser);
    if (!$stmt->execute()) {
        throw new Exception('Erro ao excluir: ' . $stmt->error);
    }
    $stmt->close();

    session_unset();
    session_destroy();

    $response['sucesso']  = true;
    $response['mensagem'] = 'Conta excluída com sucesso. Sentiremos sua falta! 😢';

} catch (Throwable $e) {
    $response['mensagem'] = $e->getMessage();
}

echo json_encode($response);
?>