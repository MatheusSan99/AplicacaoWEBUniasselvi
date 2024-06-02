<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Repository\NewsRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonNewsListController implements RequestHandlerInterface
{
    public function __construct(private NewsRepository $newsRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $newsList = array_map(function (News $news): array {
            return [
                'id' => $news->getId(),
                'title' => $news->getTitle(),
                'content' => $news->getContent(),
                'author' => $news->getAuthor(),
                'date' => $news->getDate()->format('Y-m-d H:i:s')

            ];
        }, $this->newsRepository->all());

        return new Response(200, [
            'Content-Type' => 'application/json'
        ], json_encode($newsList));
    }
}
