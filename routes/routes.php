<?php

// Autoload de classes
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/../app/controllers/' . $className . '.php';
});

// Classe para manipulação de rotas
class Router
{
    // Método para direcionar a rota para o controlador apropriado
    public static function route($route)
    {
        // Remove a barra inicial da rota, se houver
        $route = rtrim($route, '/');

        // Verifica a rota e chama o método correspondente no controlador
        switch ($route) {
            case '':
                HomeController::index();
                break;
            case 'sobre':
                // AboutController::index();
                break;
            default:
                self::notFound();
                break;
        }
    }

    // Método para lidar com rotas não encontradas
    private static function notFound()
    {
        echo 'Página não encontrada';
    }
}

// Obtém a rota solicitada
$route = isset($_GET['url']) ? $_GET['url'] : '';

// Roteia a rota para o controlador apropriado
Router::route($route);
