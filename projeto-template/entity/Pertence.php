<?php
class Pertence{
    private int $idLivro;
    private int $idCategoria;

    public function __construct(array $dados)
    {
        $this->idLivro = (int) ($dados['id_livro'] ?? 0);
        $this->idCategoria = (int) ($dados['id_categoria'] ?? '');
    }
}