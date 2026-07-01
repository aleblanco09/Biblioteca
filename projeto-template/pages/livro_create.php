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
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo livro</title>
</head>
<body>
    
</body>
</html>