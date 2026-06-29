<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Livro.php';

class LivroRepository {
    private PDO $pdo;
    public function __construct() {
        $this->pdo = getConexao();
    }

    public function listarLivros(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM livro');
        $stmt->execute([':lid' => $Id]Livros);
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Livro($dados);
        }
        return $lista;
    }

    
    
}
