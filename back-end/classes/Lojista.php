<?php

require_once 'Usuario.php';

class Lojista extends Usuario
{
    private $nomeRestaurante;
    private $cnpj;
    private $cardapio;

    public function __construct($nome, $email, $senha, $telefone, $nomeRestaurante, $cnpj)
    {
        parent::__construct($nome, $email, $senha, $telefone);
        
        $this->nomeRestaurante = $nomeRestaurante;
        $this->cnpj = $cnpj;
        $this->cardapio = [];
    }

    public function getNomeRestaurante()
    {
        return $this->nomeRestaurante;
    }
    
    public function getCnpj()
    {
        return $this->cnpj;
    }
    
    public function getCardapio()
    {
        return $this->cardapio;
    }
    
    public function gerenciarCardapio($item, $acao = 'adicionar')
    {
        if ($acao == 'adicionar') {
            $this->cardapio[] = $item;
            return "Item '" . $item . "' adicionado ao cardápio do restaurante " . $this->nomeRestaurante . ".";
        }
    }
    
    public function verPedidosRecebidos()
    {
        return "Exibindo pedidos recebidos para o restaurante " . $this->nomeRestaurante . ".";
    }
}