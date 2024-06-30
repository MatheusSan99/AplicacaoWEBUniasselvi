<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Helper\FlashMessageTrait;
use Seminario\Mvc\Helper\FormErrorHandlerTrait;
use Seminario\Mvc\Helper\HtmlRendererTrait;
use Seminario\Mvc\Repository\NewsRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateNewsController
{
    use FlashMessageTrait;
    use HtmlRendererTrait;
    use FormErrorHandlerTrait;

    public function __construct(private NewsRepository $NewsRepository)
    {
        $_SESSION['operation'] = 'create-news';
    }

    public function createNews(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, body: $this->renderTemplate('news-form'));
    }

    public function confirmCreation(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = $request->getParsedBody();

        $title = $this->validateString($requestBody['title'], 'Título');

        $content = $this->validateString($requestBody['content'], 'Conteúdo');

        $author = $this->validateString($requestBody['author'], 'Autor');

        $category = $this->validateString($requestBody['category'], 'Categoria');

        $image = $request->getUploadedFiles()['image'] ?? null;

        $content = filter_var($requestBody['content']);

        if ($image != null) {
            $imageContent = $image->getStream()->getContents();

            $imageContent = base64_encode($imageContent);   
        } else {
            $imageContent = null;
        }

        if (count($this->errors) > 0) {
            $this->addErrorsToList();

            return new Response(302, [
                'Location' => '/nova-noticia'
            ]);
        }

        $News = new News($title, $content, $author, new \DateTime(), $category, $imageContent);

        $success = $this->NewsRepository->add($News);

        if ($success === false) {
            $this->addErrorMessage('Erro ao cadastrar a notícia');
            return new Response(302, [
                'Location' => '/nova-noticia'
            ]);
        }

        $this->addSuccessMessage('Notícia cadastrada com sucesso');
        
        return new Response(302, [
            'Location' => '/'
        ]);

    }
}
