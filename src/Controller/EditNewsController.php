<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Helper\FormErrorHandlerTrait;
use Seminario\Mvc\Helper\HtmlRendererTrait;
use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Helper\FlashMessageTrait;
use Seminario\Mvc\Repository\NewsRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EditNewsController
{
    use FlashMessageTrait;
    use HtmlRendererTrait;
    use FormErrorHandlerTrait;

    public function __construct(private NewsRepository $newsRepository)
    {
        $_SESSION['operation'] = 'edit-news';
    }

    public function editNews(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);

        if ($id === false || $id === null) {
            $this->addErrorMessage('ID inválido');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $News = $this->newsRepository->find($id);
        if ($News === null) {
            $this->addErrorMessage('Notícia não encontrada');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        return new Response(200, body: $this->renderTemplate(
            'news-form',
            ['news' => $News]
        ));
    }

    public function confirmEdit(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $requestBody = $request->getParsedBody();

        $id = $this->validateInt(intval($queryParams['id']), 'ID');

        $content = $this->validateString($requestBody['content'], 'Conteúdo');

        $title = $this->validateString($requestBody['title'], 'Título');

        $author = $this->validateString($requestBody['author'], 'Autor');

        $category = $this->validateString($requestBody['category'], 'Categoria');

        if (count($this->errors) > 0) {
            $this->addErrorsToList();

            return new Response(302, [
                'Location' => '/editar-noticia?id=' . $id
            ]);
        }

        $News = new News($title, $content, $author, new \DateTime(), $category);

        $News->setId($id);

        $success = $this->newsRepository->update($News);

        if ($success === false) {
            $this->addErrorMessage('Erro ao atualizar o notícia');
            return new Response(302, [
                'Location' => '/editar-noticia?id=' . $id
            ]);
        }

        $this->addSuccessMessage('Notícia atualizada com sucesso');

        return new Response(302, [
            'Location' => '/'
        ]);
    }

}