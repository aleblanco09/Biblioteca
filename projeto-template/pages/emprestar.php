<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';
require_once __DIR__ . '/../repository/UsuarioRepository.php';
require_once __DIR__ . '/../repository/EmprestimoRepository.php';

$repo = new LivroRepository();
$id = 0;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
$livro=$repo->procurarId($id);
?>
<div></div>