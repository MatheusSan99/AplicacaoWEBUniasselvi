<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Helper\HtmlRendererTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Seminario\Mvc\Helper\FlashMessageTrait;
use Seminario\Mvc\Helper\FormErrorHandlerTrait;
use Seminario\Mvc\Repository\NewsRepository;

class NewsVisualizationController
{
    use FlashMessageTrait;
    use HtmlRendererTrait;
    use FormErrorHandlerTrait;
    
    public function __construct(private NewsRepository $newsRepository)
    {
    }

    public function visualizeNews(ServerRequestInterface $request) : ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        $id = $queryParams['id'];

        if ($id === false || $id === null) {
            $this->addErrorMessage('Notícia não encontrada');
            return new Response(302, [
                'Location' => '/'
            ]);
        }
        
        $news = $this->newsRepository->find(intval($id));

        if ($news === null) {
            $this->addErrorMessage('Notícia não encontrada');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        return new Response(200, body: $this->renderTemplate(
            'news-visualization',
            ['news' => $news]
        ));
    }
}