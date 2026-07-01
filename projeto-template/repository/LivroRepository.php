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
    public function salvarEdicao(Livro $livro): void{
            if ($livro->getIdLivro() > 0) {
            $stmt = $this->pdo->prepare('UPDATE livro SET nome_livro = :nomeL, nome_autor = :nomeA, capa = :capa WHERE id_livro = :idL');
            $stmt->execute([':nomeL'=> $livro->getNomeLivro(),':nomeA'=> $livro->getNomeAutor(),':capa'=> $livro->getCapa(),':idL'=> $livro->getIdLivro()]);
            return;
        }
    }
    public function inserirLivro(Livro $livro)
    {
        $stmt = $this->pdo->prepare('INSERT INTO livro (nome_livro,nome_autor, capa) VALUES (:nomeL,:nomeA, :capa)');
        $stmt->execute([':nomeL'=>$livro->getNomeLivro(),':nomeA'=>$livro->getNomeAutor(),':capa'=>$livro->getCapa()]);
    }
}
