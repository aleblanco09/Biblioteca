<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Livro.php';

class LivroRepository {
    $pdo = new PDO("mysql:host=localhost;dbname=biblioteca_bd");
      @return Livro[]
    public function listarLivros(int $IdLivros): array {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM livro WHERE id_livro = :$lid ORDER BY nome ASC'
        );
        $stmt->execute([':lid' => $Id]Livros);
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Livro($dados);
        }
        return $lista;
    }

    
    
}
