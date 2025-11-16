<?php
header('Content-Type: application/json; charset=utf-8');

// Configurações de conexão
require_once "../conta/config/conexao.php"; // ✅ Caminho corrigido

// Array de resposta
$response = array();

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Captura dados do formulário
        $nome = trim($_POST["firstname"] ?? '');
        $sobrenome = trim($_POST["lastname"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $celular = trim($_POST["number"] ?? '');
        $cidade = trim($_POST["cidade"] ?? '');
        $estado = trim($_POST["estado"] ?? '');
        $genero = trim($_POST["gender"] ?? '');
        
        // Validação
        if (empty($nome) || empty($sobrenome) || empty($email) || empty($celular) || 
            empty($cidade) || empty($estado) || empty($genero)) {
            throw new Exception("Por favor, preencha todos os campos obrigatórios.");
        }
        
        // Validar email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Por favor, insira um e-mail válido.");
        }
        
        // Processar upload do currículo
        $diretorio = "../uploads/curriculos/";
        
        // Criar diretório se não existir
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }
        
        if (!isset($_FILES["curriculo"]) || $_FILES["curriculo"]["error"] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro ao enviar o currículo. Por favor, tente novamente.");
        }
        
        $arquivo = $_FILES["curriculo"];
        $nomeArquivo = basename($arquivo["name"]);
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        
        // Validar extensão
        $extensoesPermitidas = ['pdf', 'doc', 'docx'];
        if (!in_array($extensao, $extensoesPermitidas)) {
            throw new Exception("Formato de arquivo inválido. Envie PDF, DOC ou DOCX.");
        }
        
        // Validar tamanho (5MB)
        if ($arquivo["size"] > 5242880) {
            throw new Exception("O arquivo é muito grande. Tamanho máximo: 5MB");
        }
        
        // Nome único para o arquivo
        $nomeUnico = time() . "_" . uniqid() . "_" . preg_replace('/[^a-zA-Z0-9._-]/', '', $nomeArquivo);
        $caminhoDestino = $diretorio . $nomeUnico;
        
        // Move o arquivo
        if (!move_uploaded_file($arquivo["tmp_name"], $caminhoDestino)) {
            throw new Exception("Erro ao salvar o currículo. Tente novamente.");
        }
        
        // Insere no banco de dados
        $stmt = $conn->prepare(
            "INSERT INTO candidatos (nome, sobrenome, email, celular, cidade, estado, genero, curriculo) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );
        
        if (!$stmt) {
            throw new Exception("Erro ao preparar consulta: " . $conn->error);
        }
        
        $stmt->bind_param("ssssssss", $nome, $sobrenome, $email, $celular, $cidade, $estado, $genero, $caminhoDestino);
        
        if ($stmt->execute()) {
            $response['sucesso'] = true;
            $response['mensagem'] = "Currículo enviado com sucesso! Entraremos em contato pelo e-mail <strong>$email</strong>.";
        } else {
            throw new Exception("Erro ao salvar no banco: " . $stmt->error);
        }
        
        $stmt->close();
        $conn->close();
        
    } else {
        throw new Exception("Método de requisição inválido.");
    }
    
} catch (Exception $e) {
    // Remove arquivo se houver erro após upload
    if (isset($caminhoDestino) && file_exists($caminhoDestino)) {
        unlink($caminhoDestino);
    }
    
    $response['sucesso'] = false;
    $response['mensagem'] = $e->getMessage();
}

echo json_encode($response);
?>