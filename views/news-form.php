<?php
require_once __DIR__ . '/inicio-html.php';
use Seminario\Mvc\Entity\News;
/** @var News|null $news */
?>
<body class="login-page sidebar-collapse">
    <div class="page-header clear-filter" filter-color="orange">
        <main class="container mt-5">
            <div class="card card-body text-black">
                <form class="form" method="post" novalidate>
                    <?php if ($_SESSION['operacaoPrincipal'] === 'nova-noticia') : ?>
                    <h2 class="title text-center">Envie uma notícia!</h2>
                    <?php else : ?>
                    <h2 class="title text-center">Edite a notícia!</h2>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" name="title" value="<?= $news?->getTitle() ?? ''; ?>" class="form-control"
                            required placeholder="Digite o título" id="title">
                        <div class="invalid-feedback">
                            Por favor, insira um título.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">Conteúdo</label>
                        <textarea name="content" class="form-control" required placeholder="Digite o conteúdo"
                            id="content"><?= $news?->getContent() ?? ''; ?></textarea>
                        <div class="invalid-feedback">
                            Por favor, insira o conteúdo.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="form-label">Autor</label>
                        <input type="text" name="author" value="<?= $news?->getAuthor() ?? ''; ?>" class="form-control"
                            required placeholder="Digite o autor" id="author">
                        <div class="invalid-feedback">
                            Por favor, insira o autor.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round">Enviar</button>
                </form>
            </div>
        </main>
    </div>

<?php

require_once __DIR__ . '/fim-html.php';