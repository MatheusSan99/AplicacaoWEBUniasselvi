<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Helper\FlashMessageTrait;
use Seminario\Mvc\Repository\NewsRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewNewsController implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function __construct(private NewsRepository $NewsRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = $request->getParsedBody();
        $title = filter_var($requestBody['title']);
        if ($title === false) {
            $this->addErrorMessage('Título não informado');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $content = filter_var($requestBody['content']);

        if ($content === false) {
            $this->addErrorMessage('Conteúdo não informado');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $author = filter_var($requestBody['author']);

        if ($author === false) {
            $this->addErrorMessage('Autor não informado');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $News = new News($title, $content, $author, new \DateTime());

        $success = $this->NewsRepository->add($News);

        if ($success === false) {
            $this->addErrorMessage('Erro ao cadastrar a notícia');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        return new Response(302, [
            'Location' => '/'
        ]);

    }
}
