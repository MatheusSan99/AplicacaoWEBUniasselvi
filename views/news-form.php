<?php
require_once __DIR__ . '/inicio-html.php';

use Seminario\Mvc\Entity\News;

/** @var News|null $news */
?>
<!DOCTYPE html>

<main class="container mt-5">
    <div class="card card-body">
        <form class="needs-validation" method="post" novalidate>
            <h2 class="title text-center">Envie uma notícia!</h2>
            <div class="form-group">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" value="<?= $news?->getTitle() ?? ''; ?>" class="form-control" required
                    placeholder="Digite o título" id="titulo">
                <div class="invalid-feedback">
                    Por favor, insira um título.
                </div>
            </div>
            <div class="form-group">
                <label for="conteudo" class="form-label">Conteúdo</label>
                <textarea name="conteudo" class="form-control" required placeholder="Digite o conteúdo"
                    id="conteudo"><?= $news?->getContent() ?? ''; ?></textarea>
                <div class="invalid-feedback">
                    Por favor, insira o conteúdo.
                </div>
            </div>
            <div class="form-group">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" name="autor" value="<?= $news?->getAuthor() ?? ''; ?>" class="form-control" required
                    placeholder="Digite o autor" id="autor">
                <div class="invalid-feedback">
                    Por favor, insira o autor.
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-round">Enviar</button>
        </form>
    </div>
</main>
<?php
require_once __DIR__ . '/fim-html.php';
