<?php
class Emprestimo {

    private int    $id_emprestimo;
    private string $status;
    private string $data;
    private string $data_devolucao;
    private int $id_usuario
    private int $id_livro
    
    public function __construct(array $dados) {
        $this->$id_emprestimo = (int) ($dados['id_emprestimo']?? 0);
        $this->status = $dados['status']?? '';
        $this->data = $dados['data']?? '';
        $this->data_devolucao = ($dados['data_devolucao']?? 1);
        $this->id_usuario = (int) ($dados['id_usuario'] ?? 0);
        $this->id_livro = (int) ($dados['id_livro'] ?? 0);
    }
    public function getIdEmprestimo():        int    { return $this->id_emprestimo; }
    public function getStatus():      string { return $this->status; }
    public function getData():      string { return $this->data; }
    public function getDataDevolucao():     int    { return $this->data_devolucao; }
    public function getIdUsuarioE(): int    { return $this->id_usuario; }
    public function getIdLivroE(): int    { return $this->id_livro; }
}