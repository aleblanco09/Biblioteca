<?php

session_start();

// Se já estiver logado, vai direto para a página principal
if (!empty($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/../repository/UsuarioRepository.php';

$erro = '';
$emailFormulario = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($email === '' || $senha === '') {
        $erro = 'Preencha todos os campos.';
    } else {
        $repo    = new UsuarioRepository();
        $usuario = $repo->buscarPorEmail($email);

        // Compara o hash SHA256 da senha digitada com o hash salvo no banco
        if ($usuario && hash('sha256', $senha) === $usuario->getSenha()) {
            $_SESSION['usuario_id']   = $usuario->getId();
            $_SESSION['usuario_nome'] = $usuario->getNome();

            header('Location: index.php');
            exit;
        } else {
            $erro = 'E-mail ou senha inválidos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login — Biblioteca</title>
</head>
<body>
   <h1>Biblioteca</h1>
  <h1>Login</h1>

  <?php if ($erro !== ''): ?>
    <div class="alert alert-erro"><?= htmlspecialchars($erro) ?></div>
  <?php endif; ?>

  <form method="POST" action="login.php">
      <label for="email">E-mail</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="seu@email.com"
        value="<?= htmlspecialchars($emailFormulario) ?>"
        required
      />

      <label for="senha">Senha</label>
      <input
        type="password"
        id="senha"
        name="senha"
        placeholder="••••••••"
        required
      />

    <button type="submit">Entrar</button>
  </form>



</body>
</html>
