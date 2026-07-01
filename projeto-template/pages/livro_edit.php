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
    $livro = $repoLivro->procurarId($id);
}

if (!isset($livro)) {
    header('Location: index.php');
    exit;
}
$categ=[];
$repoRelacionamento = new PertenceRepository();
$relacionamentos= $repoRelacionamento->listarPertencimentos($livro->getIdLivro());

$erro = '';
$nomeLivro = $livro->getNomeLivro();
$capa = $livro->getCapa();
$nomeAutor = $livro->getNomeAutor();

$diretorio = "../uploads/";
if (isset($_FILES['capaEdit'])) {

    $arquivo = $_FILES['capaEdit'];
    $nomeArquivo = basename($arquivo['name']);
    $caminho = $diretorio . $nomeArquivo;
    move_uploaded_file($arquivo['tmp_name'], $caminho);
    $capa=$caminho;
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeLivro  = trim($_POST['nomeLivroEdit'] ?? '');
    $nomeAutor  = trim($_POST['nomeAutorEdit'] ?? '');
    
    try {
      $livro->alterarDados($nomeLivro, $nomeAutor, $capa);
      $repoLivro->salvarEdicao($livro);
        header('Location: index.php');
        exit;
    } catch (InvalidArgumentException $e) {
        $erro = $e->getMessage();
    }
}
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
      <label>Editar nome do Livro:</label>
      <input type="text" name="nomeLivroEdit" value="<?=$nomeLivro?>" required/>

      <label>Editar nome do Autor:</label>
      <input type="text" name="nomeAutorEdit" value="<?=$nomeAutor?>" required/>

      <label>Editar categoria:</label>
      <select name="categoriaEdit">
      <?php foreach($categorias as $i):?>
<option value="<?=$i->getIdCategoria()?>"><?= $i->getNomeCategoria() ?></option>
<?php endforeach; ?>
</select>
<label>Editar capa:</label>
    <input type="file" name="capaEdit" accept="image/*"><br><br>
    <button type="submit">Enviar</button>

  </form>
</body>
</html>