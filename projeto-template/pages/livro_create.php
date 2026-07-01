<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';
require_once __DIR__ . '/../repository/CategoriaRepository.php';
require_once __DIR__ . '/../repository/PertenceRepository.php';

$repoLivro = new LivroRepository();

$erro = "";
$nomeLivro = $livro->getNomeLivro();
$capa = $livro->getCapa();
$nomeAutor = $livro->getNomeAutor();

$diretorio = "../uploads/";