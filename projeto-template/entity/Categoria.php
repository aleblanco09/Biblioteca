<?php class Categoria {
    private int    $id;
    private string $nome;
    
    public function __construct(array $dados) {
        $this->id = (int) ($dados['id_categoria'] ?? 0);
        $this->nome = $dados['nome_categoria'] ?? '';
    }

    public function getIdCategoria(): int { return $this->id; }
    public function getNomeCategoria(): string { return $this->nome; }
}