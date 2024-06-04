<?php

use Seminario\Mvc\Entity\News;

require_once __DIR__ . '/inicio-html.php';
/** @var News[] $newsList */
?>

<ul class="news__container">
    <?php foreach ($newsList as $news): ?>
        <li class="news__item>
            <h3><?= $news->getTitle(); ?></h3>
            <p><?= $news->getContent(); ?></p>
            <p><?= $news->getAuthor(); ?></p>
            <p><?= $news->getDate()->format('d/m/Y'); ?></p>
            <div class="acoes-news">
                <a href="/editar-news?id=<?= $news->getId(); ?>">Editar</a>
                <a href="/remover-news?id=<?= $news->getId(); ?>">Excluir</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/fim-html.php';