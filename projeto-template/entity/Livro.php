<?php class Livro {

    private int    $id;
    private string $nome;
    private string $capa;
    private string $autor;
    private string $comentario;

    public function __construct(array $dados) {
        $this->id = (int) ($dados['id_livro']       ?? 0);
        $this->nome =  $dados['nome_livro']      ?? '';
        $this->capa = $dados['capa']     ?? '';
        $this->autor = $dados['nome_autor'] ?? '';
        $this->comentario = $dados['comentario'] ?? '';
    }

    public function getIdLivro(): int { return $this->id; }
    public function getNomeLivro(): string { return $this->nome; }
    public function getCapa(): string { return $this->capa; }
    public function getNomeAutor(): string { return $this->autor; }
    public function getComentario(): string { return $this->comentario; }

    public static function novoLivro(string $nome, string $autor, string $capa): Livro {
        $livro = new Livro();
        $livro->alterarDados($nome,$autor,$capa);
        return $livro;
    }

    public function alterarDados(string $nome, string $autor, string $capa): void {
        $nome = trim($nome);
        $autor = trim($autor);
        $capa = trim($capa);
        
        $this->nome  = $nome;
        $this->autor  = $autor;
        $this->capa = $capa;
    }
}
