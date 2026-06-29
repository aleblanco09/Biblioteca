<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Pertence.php';

class PertenceRepository {

    private PDO $pdo;
    public function __construct() {
        $this->pdo = getConexao();
    }

    public function listarPertencimentos($id_livro): array {
        $stmt = $this->pdo->prepare('SELECT * FROM pertence WHERE id_livro=:idl');
        $stmt->execute([':idl' => $id_livro]);
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Pertence($dados);
        }
        return $lista;
    }
}