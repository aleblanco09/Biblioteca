<?php

class Usuario {

    private int    $id;
    private string $nome;
    private string $senha;
    private string $email;

    public function __construct(array $dados) {
        $this->id = (int) ($dados['id'] ?? 0);
        $this->nome = $dados['nome'] ?? '';
        $this->senha = $dados['senha'] ?? '';
        $this->email = $dados['email'] ?? '';
    }

    public function getId():       int    { return $this->id; }
    public function getNome():     string { return $this->nome; }
    public function getSenha():    string { return $this->senha; }
    public function getEmail():    string { return $this->email; }
}
