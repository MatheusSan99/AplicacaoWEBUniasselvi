<?php

require_once __DIR__ . '/inicio-html.php';

use Seminario\Mvc\Entity\News;

/** @var News $newsList */
?>

<body class="login-page sidebar-collapse">
  <div class="page-header clear-filter" filter-color="orange">
    <main class="container mt-5">
      <div class="card card-body text-black">
        <h2 class="title text-center"><b><?= htmlspecialchars($news->getTitle(), ENT_QUOTES, 'UTF-8'); ?></b></h2>
        <p class="card-category text-center"><b>Publicado por <?= htmlspecialchars($news->getAuthor(), ENT_QUOTES, 'UTF-8'); ?> em <?= htmlspecialchars($news->getDate(), ENT_QUOTES, 'UTF-8'); ?></b></p>

        <?php if ($news->getImage() !== null): ?>
        <div class="news-image text-center">
          <img src="data:image/jpeg;base64,<?= htmlspecialchars($news->getImage(), ENT_QUOTES, 'UTF-8'); ?>" alt="Imagem da notícia" class="img-fluid">
        </div>
        <?php endif; ?>
        <div class="news-content">
          <p><b><?= nl2br(htmlspecialchars($news->getContent(), ENT_QUOTES, 'UTF-8')); ?></b></p>
        </div>
        <div class="news-category text-center">
          <span class="badge badge-info"><?= htmlspecialchars($news->getCategory(), ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
      </div>
    </main>
  </div>

<?php require_once __DIR__ . '/fim-html.php'; ?>
