<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Categoria.php';

class CategoriaRepository {

    private PDO $pdo;
    public function __construct() {
        $this->pdo = getConexao();
    }

    public function listarCategorias(): array {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM categoria'
        );
        $stmt->execute();
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Categoria($dados);
        }
        return $lista;
    }
}