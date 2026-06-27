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
    
}