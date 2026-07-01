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
        $stmt->execute();
        $lista = [];
        foreach ($stmt->fetchAll() as $dados) {
            $lista[] = new Livro($dados);
        }
        return $lista;
    }

    public function procurarId(int $id): ?Livro {
        $stmt = $this->pdo->prepare('SELECT * FROM livro WHERE id_livro = :id');
        $stmt->execute([':id' => $id]);
        $dados = $stmt->fetch();
        if ($dados) {
            return new Livro($dados);
        }
        return null;
    }
    public function excluirLivro(int $id): void {
        $stmt = $this->pdo->prepare('DELETE FROM livro WHERE id_livro = :id');
        $stmt->execute([':id' => $id]);
    }
    public function salvar(Livro $livro): void{

    }
}
