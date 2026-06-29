<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Pertence.php';

class PertenceRepository {

    private PDO $pdo;
    public function __construct() {
        $this->pdo = getConexao();
    }
}