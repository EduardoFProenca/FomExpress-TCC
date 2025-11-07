<?php
class ConexaoBD
{
    //Variáveis de conexão com o banco de dados
    private $server = "localhost";
    private $user = "root";
    private $password = "root";
    private $db = "projeto_final";

    //Método para conectar ao banco de dados
    public function conectar()
    {
        //conexão com o banco de dados usando PDO   
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            return null;
        }
    }
}
