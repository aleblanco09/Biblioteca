<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Categoria.php';

class CategoriaRepository {

    private PDO $pdo;

    public function __construct() {
        $this->pdo = getConexao();
    }
}