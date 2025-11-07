<?php
require_once 'ConexaoBD.php';

class Produto
{
    private $idProduto;
    private $idLojista;
    private $nome;
    private $descricao;
    private $preco;
    private $categoria;
    private $imagemUrl;

    public function listarTodos()
    {
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM produto";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
