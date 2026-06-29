<?php

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../repository/LivroRepository.php';

$repo     = new LivroRepository();
$livros = $repo->listarLivros();

?>

  <h2>Livros</h2>
  
  
        <?php foreach ($pokemons as $pokemon): ?>
          <tr>
            <td><?= $pokemon->getId() ?></td>
            <td><strong><?= htmlspecialchars($pokemon->getNome()) ?></strong></td>
            <td><span class="badge badge-tipo"><?= htmlspecialchars($pokemon->getTipo()) ?></span></td>
            <td>Lv. <?= $pokemon->getNivel() ?></td>
            <td class="acoes">
              <a href="pokemon_edit.php?id=<?= $pokemon->getId() ?>" class="btn btn-sm btn-editar">Editar</a>
              <a href="pokemon_delete.php?id=<?= $pokemon->getId() ?>" class="btn btn-sm btn-excluir">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>
