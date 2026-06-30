<?php
require_once __DIR__.'auth.php';
require_once __DIR__.'../repository/LivroRepository.php';

$repo = new LivroRepository();
$id = 0;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}

if ($id > 0) {
    $livro = $livro->ProcurarId($id);
}

if (isset($livro)) {
    header('Location: index.php');
    exit;
}?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmar exclusão</title>
</head>
<body>
  
</body>
</html>