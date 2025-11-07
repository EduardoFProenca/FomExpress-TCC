<?php

class Usuario
{
    protected $nome;
    protected $email;
    protected $senha;
    protected $telefone;

    public function __construct($nome, $email, $senha, $telefone)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha; 
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function login()
    {
        return "O usuário " . $this->nome . " realizou login com sucesso.";
    }

    public function logout()
    {
        return "O usuário " . $this->nome . " fez logout.";
    }
}