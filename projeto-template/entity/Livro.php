<?php class Livro {

    private int    $id;
    private string $nome;
    private string $capa;
    private string $nomeAutor;
    private string $comentario;

    public function __construct(array $dados) {
        $this->id = (int) ($dados['id']       ?? 0);
        $this->nome =  $dados['nome']      ?? '';
        $this->capa = $dados['capa']     ?? '';
        $this->nomeAutor = $dados['nomeAutor'] ?? '';
        $this->comentario = $dados['comentario'] ?? '';
    }

    public function getId():       int    { return $this->id; }
    public function getNome():     string { return $this->nome; }
}
