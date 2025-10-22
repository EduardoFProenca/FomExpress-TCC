<?php

require_once 'Usuario.php';

class Cliente extends Usuario
{
    private $enderecoEntrega;
    private $historicoPedidos;

    public function __construct($nome, $email, $senha, $telefone, $enderecoEntrega)
    {
        parent::__construct($nome, $email, $senha, $telefone);
        
        $this->enderecoEntrega = $enderecoEntrega;
        $this->historicoPedidos = [];
    }

    public function getEnderecoEntrega()
    {
        return $this->enderecoEntrega;
    }

    public function setEnderecoEntrega($endereco)
    {
        $this->enderecoEntrega = $endereco;
    }
    
    public function getHistoricoPedidos()
    {
        return $this->historicoPedidos;
    }
    
    public function fazerPedido($pedido)
    {
        $this->historicoPedidos[] = $pedido;
        return "Pedido '" . $pedido . "' realizado com sucesso para o endereço: " . $this->enderecoEntrega;
    }
    
    public function login()
    {
        return "O cliente " . $this->getNome() . " acessou a área de compras.";
    }
}