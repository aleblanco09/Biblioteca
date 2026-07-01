<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';
require_once __DIR__ . '/../repository/CategoriaRepository.php';
require_once __DIR__ . '/../repository/PertenceRepository.php';

$repoLivro = new LivroRepository();
$repoCategoria = new CategoriaRepository();
$categorias = $repoCategoria->listarCategorias();

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
$categ=[];
$repoRelacionamento = new PertenceRepository();
$relacionamentos= $repoRelacionamento->listarPertencimentos($livro->getIdLivro());
foreach ($relacionamentos as $relacionamento)
            {
              foreach ($categorias as $categoria)
                {
                 if($categoria->getIdCategoria() === $relacionamento->getIdCategoriaP())
                  {
                    $categ[]= $categoria->getNomeCategoria();
                  }
                }
            }

$erro = '';
$nomeLivro = $livro->getNomeLivro();
$capa = $livro->getCapa();
$nomeAutor = $livro->getNomeAutor();
$categoriasDoLivro = $categ;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar livro</title>
</head>
<body>
    <h2>Editar livro</h2>
  <a href="index.php">← Voltar</a>
<?php if ($erro !== ''): ?>
  <p><?=$erro?></p>
<?php endif; ?>


<form method="POST" action="livro_edit.php?id=<?=$livro->getIdLivro()?>">
  </form>
</body>
</html>