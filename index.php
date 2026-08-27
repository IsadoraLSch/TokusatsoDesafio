<?php
// index.php - Front Controller Principal
session_start();

// Autoload simples para Controllers e Models
spl_autoload_register(function($class) {
    $paths = ['app/controllers/', 'app/models/'];
    foreach ($paths as $p) {
        // Correção da concatenação do caminho com o nome da classe
        $file = __DIR__ . '/' . $p . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Roteamento: recebe "controller/action" (ex: "hero/index", "auth/login", "hero/show")
$route = $_GET['route'] ?? 'home/index';
$route = trim($route, '/');
$parts = explode('/', $route);

$controllerName = !empty($parts[0]) ? $parts[0] : 'home';
$action = $parts[1] ?? 'index';

// Transforma o nome da rota na classe do controller (ex: hero -> HeroController)
$controllerClass = ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    if (method_exists($controller, $action)) {
        echo $controller->$action();
        exit;
    }
}

// Erro 404 caso o Controller ou a Action não existam
http_response_code(404);
echo "<h1>404 - Página não encontrada</h1>";