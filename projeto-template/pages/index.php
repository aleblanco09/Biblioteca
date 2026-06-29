<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';

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
                 if($categoria === $pertencimento)
                  {
                    $categ= $categoria->getNomeCategoria()." ";
                  }
                }
            }?>
            <?php echo "Capa:<br>"?>
            <img src="<?=$livro->getCapa()?>">
            <?php echo "<br>Id:".$livro->getIdLivro()."<br>"?>
            <?php echo "Nome:".$livro->getNomeLivro()."<br>"?>
            <?php echo "Autor:".$livro->getNomeAutor()."<br>"?>
            <?php echo "Categorias: ".$categ."<br>";
            <a href="livro_edit.php?id=<?= $livro->getIdLivro() ?>">Editar</a>
            <a href="livro_delete.php?id=<?= $livro->getIdLivro() ?>">Excluir</a>
            <a href="emprestar.php?id=<?= $livro->getIdLivro() ?>">Empréstimo</a>
        <?php endforeach; ?>
