<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Repository\NewsRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewJsonNewsController implements RequestHandlerInterface
{
    public function __construct(private NewsRepository $newsRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $request = $request->getBody()->getContents();
        $newsData = json_decode($request, true);
        $news = new News(
            $newsData['title'],
            $newsData['content'],
            $newsData['author'],
            new \DateTime($newsData['date'])
        );

        $this->newsRepository->add($news);

        return new Response(201);
    }
}
