<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';
require_once __DIR__ . '/../repository/CategoriaRepository.php';
require_once __DIR__ . '/../repository/PertenceRepository.php';

$nomeUser = $_SESSION['usuario_nome'];
echo "<h1>".$nomeUser."</h1>";
$repo = new LivroRepository();
$livros = $repo->listarLivros();
$repo3 = new CategoriaRepository();
$categorias = $repo3->listarCategorias();
$categ=""
?>

  <h2>Livros</h2>
    <?php foreach ($livros as $livro): ?>
          
            <?php $repo2 = new PertenceRepository(); 
            $pertencimentos= $repo2->listarPertencimentos($livro->getIdLivro());
            foreach ($pertencimentos as $pertencimento)
            {
              foreach ($categorias as $categoria)
                {
                 if($categoria->getIdCategoria() === $pertencimento->getIdCategoriaP())
                  {
                    $categ= $categ.$categoria->getNomeCategoria()." ";
                  }
                }
            }?>
            <?php echo "<br>Capa:<br>"?>
            <img src="<?=$livro->getCapa()?>" width="160">
            <?php echo "<br>Id:".$livro->getIdLivro()."<br>"?>
            <?php echo "Nome:".$livro->getNomeLivro()."<br>"?>
            <?php echo "Autor:".$livro->getNomeAutor()."<br>"?>
            <?php echo "Categorias: ".$categ."<br>";$categ=""?>
            <a href="livro_edit.php?id=<?= $livro->getIdLivro() ?>">Editar</a>
            <a href="livro_delete.php?id=<?= $livro->getIdLivro() ?>">Excluir</a>
            <a href="emprestar.php?id=<?= $livro->getIdLivro() ?>">Empréstimo</a>
            <?= "<br><br>";?>
        <?php endforeach; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página principal</title>
</head>
<body>
  
<a href="logout.php">Sair</a>
</body>
</html>