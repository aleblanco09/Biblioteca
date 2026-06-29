<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';

$repo     = new LivroRepository();
$livros = $repo->listarLivros();

?>

  <h2>Livros</h2>
    <?php foreach ($livros as $livro): ?>
          
            <?php echo "Capa:<br>"?>
            <img src="<?=$livro->getCapa()?>">
            <?php echo "<br>Id:".$livro->getId()."<br>"?>
            <?php echo "Nome:".$livro->getNome()."<br>"?>
            <?php echo "Autor:".$livro->getNomeAutor()."<br>"?>
            <a href="livro_edit.php?id=<?= $livro->getId() ?>">Editar</a>
            <a href="livro_delete.php?id=<?= $livro->getId() ?>">Excluir</a>
            <a href="emprestar.php?id=<?= $livro->getId() ?>">Empréstimo</a>
        <?php endforeach; ?>
