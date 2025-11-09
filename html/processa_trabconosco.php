<?php
require_once "back-end/config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["firstname"];
    $sobrenome = $_POST["lastname"];
    $email = $_POST["email"];
    $celular = $_POST["number"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $genero = $_POST["gender"];

    $diretorio = "upload/";
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true);
    }

    $arquivo = $_FILES["curriculo"];
    $nomeArquivo = basename($arquivo["name"]);
    $caminhoDestino = $diretorio . time() . "_" . $nomeArquivo;

    if (move_uploaded_file($arquivo["tmp_name"], $caminhoDestino)) {
        $stmt = $conn->prepare("INSERT INTO candidatos (nome, sobrenome, email, celular, cidade, estado, genero, curriculo)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nome, $sobrenome, $email, $celular, $cidade, $estado, $genero, $caminhoDestino);

        if ($stmt->execute()) {
            echo "<h2>✅ Formulário enviado com sucesso!</h2>";
        } else {
            echo "<h2>❌ Erro ao salvar no banco: " . $stmt->error . "</h2>";
        }

        $stmt->close();
    } else {
        echo "<h2>❌ Erro ao fazer upload do currículo.</h2>";
    }

    $conn->close();
} else {
    echo "<h2>❌ Método inválido.</h2>";
}
