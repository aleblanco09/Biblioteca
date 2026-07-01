<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';
require_once __DIR__ . '/../repository/CategoriaRepository.php';
require_once __DIR__ . '/../repository/PertenceRepository.php';

$repoLivro = new LivroRepository();
$repoCategoria = new CategoriaRepository();

$id = 0;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}

$livro = null;
if ($id > 0) {
    $livro = $repo->procurarId($id);
}

if (!isset($livro)) {
    header('Location: index.php');
    exit;
}

$repoRelacionamento = new PertenceRepository();
$relacionamentos= $repoRelacionamento->listarPertencimentos($livro->getIdLivro());


$erro = '';
$nomeLivro = $livro->getNomeLivro();
$capa = $livro->getCapa();
$nomeAutor = $livro->getNomeAutor();
$categoriasDoLivro = 