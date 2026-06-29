<?php class Categoria {
    private int    $id;
    private string $nome;
    
    public function __construct(array $dados) {
        $this->id = (int) ($dados['id_categoria'] ?? 0);
        $this->nome = $dados['nome_categoria'] ?? '';
    }

    public function getId(): int { return $this->id; }
    public function getNome(): string { return $this->nome; }
}