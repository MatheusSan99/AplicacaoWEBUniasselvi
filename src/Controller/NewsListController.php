<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Helper\HtmlRendererTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Seminario\Mvc\Repository\NewsRepository;

class NewsListController implements RequestHandlerInterface
{
    use HtmlRendererTrait;

    public function __construct(private NewsRepository $newsRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $newsList = $this->newsRepository->all();

        return new Response(200, body: $this->renderTemplate(
            'news-form',
            ['newsList' => $newsList]
        ));
    }
}
