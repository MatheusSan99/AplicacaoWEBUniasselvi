<?php
require_once __DIR__ . '/inicio-html.php';
/** @var \Seminario\Mvc\Entity\News|null $video */
?>
<main class="container">
    <form class="container_formulario" method="post">
    <h2 class="formulario__titulo">Envie uma noticia!</h2>
    <div class="formulario__campo">
        <label class="campo__etiqueta" for="titulo">Titulo</label>
        <input name="titulo" value="<?= $noticia?->getTitle(); ?>" class="campo__escrita" required placeholder="Digite o titulo" id='title' />
    </div>
    <div class="formulario__campo">
        <label class="campo__etiqueta" for="conteudo">Conteudo</label>
        <textarea name="conteudo" class="campo__escrita" required placeholder="Digite o conteudo" id='content'><?= $noticia?->getContent(); ?></textarea>
    </div>
    <div class="formulario__campo">
        <label class="campo__etiqueta" for="autor">Autor</label>
        <input name="autor" value="<?= $noticia?->getAuthor(); ?>" class="campo__escrita" required placeholder="Digite o autor" id='author' />
    </div>
    <input class="formulario__botao" type="submit" value="Enviar" />
    </form>
</main>

<?php
require_once __DIR__ . '/fim-html.php';