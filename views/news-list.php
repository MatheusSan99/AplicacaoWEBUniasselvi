<?php

require_once __DIR__ . '/inicio-html.php';

use Seminario\Mvc\Entity\News;

/** @var News[] $newsList */
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Lista de Notícias</h4>
            <p class="card-category">Aqui estão as notícias mais recentes</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Título
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Autor
                  </th>
                  <th>
                    Data
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($newsList as $news): ?>
                    <tr>
                      <td><?= $news->getTitle(); ?></td>
                      <td><?= $news->getContent(); ?></td>
                      <td><?= $news->getAuthor(); ?></td>
                      <td><?= $news->getDate(); ?></td>
                      <td>
                        <a href="/editar-noticia?id=<?= $news->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                        <a href="/remover-noticia?id=<?= $news->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/fim-html.php'; ?>
