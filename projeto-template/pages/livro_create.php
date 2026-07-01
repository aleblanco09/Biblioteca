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
    <h2>Criar livro</h2>
  <a href="index.php">Voltar</a>
    <form method="POST" action="livro_create.php?id=<?=$livro->getIdLivro()?>" enctype="multipart/form-data">
<p>Nome do livro:</p><input type="text" name="LivroCriado" required/>
<p>Nome do autor:</p><input type="text" name="AutorLivroCriado" required/>
<p>Capa do livro:</p> <input type="file" name="CapaLivroCriado" accept="image/* required">
    <button type="submit">Enviar</button>
    </form>
</body>
</html>