<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Pertence.php';

class PertenceRepository {

    private PDO $pdo;
    public function __construct() {
        $this->pdo = getConexao();
    }

    public function listarPertencimentos(int $id_livro): array {
        $stmt = $this->pdo->prepare('SELECT * FROM pertence WHERE id_livro=:idl');
        $stmt->execute([':idl' => $id_livro]);
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Pertence($dados);
        }
        return $lista;
    }
    
    public function alterarPertencimento(int $id_livro, int $id_categoria): array {
        $sql = "UPDATE pertence SET id_categoria = :idC WHERE id_livro = :idL";
        $stmt = this->pdo->prepare($sql);
        $stmt->bindValue(':idC', $id_categoria);
        $stmt->bindValue(':idL', $id_livro);
        $stmt->execute();
        
        $lista=[];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Pertence($dados);
        }
        return $lista;
    }
}