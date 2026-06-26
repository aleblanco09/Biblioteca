<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Livro.php';

class PokemonRepository {

    
    /** @return Pokemon[] */
    public function listarLivros(int $IdLivros): array {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM livro WHERE id_livro = :$IdLivros ORDER BY nome ASC'
        );
        $stmt->execute([':' => $usuarioId]);
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Pokemon($dados);
        }
        return $lista;
    }

    
    
}
