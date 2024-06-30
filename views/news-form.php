<?php
require_once __DIR__ . '/inicio-html.php';

use Seminario\Mvc\Entity\News;

/** @var News|null $news */
?>

<body class="login-page sidebar-collapse">
    <div class="page-header clear-filter" filter-color="orange">
        <main class="container mt-5">
            <div class="card card-body text-black">
                <form class="form" method="post" novalidate enctype="multipart/form-data">
                    <input type="hidden" name="operation" id="operation" value="<?= $_SESSION["operation"] ?>">
                    <h2 class="title text-center" id="titleNews"></h2>
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
                        <input type="text" name="author" value="<?= $_SESSION['usuario'] ?>" class="form-control"
                            required readonly id="author">
                        <div class="invalid-feedback">
                            Por favor, insira o autor.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="politica" <?= isset($news) && $news->getCategory() === 'politica' ? 'selected' : ''; ?>>Política</option>
                            <option value="esportes" <?= isset($news) && $news->getCategory() === 'esportes' ? 'selected' : ''; ?>>Esportes</option>
                            <option value="tecnologia" <?= isset($news) && $news->getCategory() === 'tecnologia' ? 'selected' : ''; ?>>Tecnologia</option>
                            <option value="entretenimento" <?= isset($news) && $news->getCategory() === 'entretenimento' ? 'selected' : ''; ?>>Entretenimento
                            </option>
                            <option value="saude" <?= isset($news) && $news->getCategory() === 'saude' ? 'selected' : ''; ?>>Saúde</option>
                            <option value="viagem" <?= isset($news) && $news->getCategory() === 'viagem' ? 'selected' : ''; ?>>Viagens</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecione uma categoria
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" name="image" id="image-upload" accept=".png, .jpeg">
                        <img src="/img/icone-upload.png" width="50px" height="50px">
                    </div>
                    <button type="submit" class="btn btn-primary btn-round">Enviar</button>
                </form>

                <?php if ($_SESSION['operation'] == 'edit-news' && !empty($news->getImage())): ?>
                    <form action="/remover-imagem" method="POST" id="remove-image-form" novalidate>
                        <input type="hidden" name="newsId" id="newsId" value="<?= $news->getId() ?>">

                        <div class="form-group mt-3">
                            <button type="button" class="btn btn-danger btn-round"
                                onclick="openModalImage('<?= htmlspecialchars($news->getImage(), ENT_QUOTES, 'UTF-8'); ?>');">Ver
                                Imagem</button>
                        </div>


                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-danger btn-round">Remover Imagem</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <div class="modal fade" id="imagemModal" tabindex="-1" role="dialog" aria-labelledby="imagemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagemModalLabel">Visualizar Imagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" alt="Imagem da notícia">
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once __DIR__ . '/fim-html.php';
    ?>