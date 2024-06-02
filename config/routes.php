<?php

declare(strict_types=1);

return [
    'GET|/' => \Seminario\Mvc\Controller\NewsListController::class,
    'GET|/nova-noticia' => \Seminario\Mvc\Controller\NewsListController::class,
    'POST|/nova-noticia' => \Seminario\Mvc\Controller\NewNewsController::class,
    'GET|/editar-noticia' => \Seminario\Mvc\Controller\NewsListController::class,
    'POST|/editar-noticia' => \Seminario\Mvc\Controller\EditNewsController::class,
    'GET|/remover-noticia' => \Seminario\Mvc\Controller\DeleteNewsController::class,
    'GET|/login' => \Seminario\Mvc\Controller\LoginFormController::class,
    'POST|/login' => \Seminario\Mvc\Controller\LoginController::class,
    'GET|/logout' => \Seminario\Mvc\Controller\LogoutController::class,
    'GET|/noticia-json' => \Seminario\Mvc\Controller\JsonNewsListController::class,
    'POST|/noticias' => \Seminario\Mvc\Controller\NewJsonNewsController::class,
];
