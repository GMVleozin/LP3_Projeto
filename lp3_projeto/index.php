<?php
// Autoload simples de controllers e models
spl_autoload_register(function ($class_name) {
    if (file_exists(__DIR__ . '/controllers/' . $class_name . '.php')) {
        require_once __DIR__ . '/controllers/' . $class_name . '.php';
    } elseif (file_exists(__DIR__ . '/models/' . $class_name . '.php')) {
        require_once __DIR__ . '/models/' . $class_name . '.php';
    }
});

// Captura a rota acessada na URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove o prefixo da subpasta '/lp3_projeto' da URI
$basePath = '/lp3_projeto';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Garante que a barra inicial exista caso a URI fique vazia (acesso a /lp3_projeto ou /lp3_projeto/)
if (empty($uri)) {
    $uri = '/';
}

// Tabela de Roteamento (Mapeamento de Rotas)
$rotas = [
    '/' => ['controller' => 'HomeController', 'metodo' => 'index'],
    '/empresa' => ['controller' => 'HomeController', 'metodo' => 'sobre'],
    '/usuarios' => ['controller' => 'UsuarioController', 'metodo' => 'index'],
    '/usuarios/adicionar' => ['controller' => 'UsuarioController', 'metodo' => 'adicionar'],
    '/usuarios/editar' => ['controller' => 'UsuarioController', 'metodo' => 'editar'],
    '/usuarios/excluir' => ['controller' => 'UsuarioController', 'metodo' => 'excluir'],
    '/categorias' => ['controller' => 'CategoriaController', 'metodo' => 'index'],
    '/categorias/adicionar' => ['controller' => 'CategoriaController', 'metodo' => 'adicionar'],
    '/categorias/editar' => ['controller' => 'CategoriaController', 'metodo' => 'editar'],
    '/categorias/excluir' => ['controller' => 'CategoriaController', 'metodo' => 'excluir'],
    '/produtos' => ['controller' => 'ProdutoController', 'metodo' => 'index'],
    '/produtos/adicionar' => ['controller' => 'ProdutoController', 'metodo' => 'adicionar'],
    '/produtos/editar' => ['controller' => 'ProdutoController', 'metodo' => 'editar'],
    '/produtos/excluir' => ['controller' => 'ProdutoController', 'metodo' => 'excluir'],
    '/clientes' => ['controller' => 'ClienteController', 'metodo' => 'index'],
    '/clientes/adicionar' => ['controller' => 'ClienteController', 'metodo' => 'adicionar'],
    '/clientes/editar' => ['controller' => 'ClienteController', 'metodo' => 'editar'],
    '/clientes/excluir' => ['controller' => 'ClienteController', 'metodo' => 'excluir'],
    '/filmes' => ['controller' => 'FilmeController', 'metodo' => 'index'],
    '/filmes/adicionar' => ['controller' => 'FilmeController', 'metodo' => 'adicionar'],
    '/filmes/editar' => ['controller' => 'FilmeController', 'metodo' => 'editar'],
    '/filmes/excluir' => ['controller' => 'FilmeController', 'metodo' => 'excluir',],
    '/genero' => ['controller' => 'GeneroController', 'metodo' => 'index'],
    '/genero/adicionar' => ['controller' => 'GeneroController', 'metodo' => 'adicionar'],
    '/genero/editar' => ['controller' => 'GeneroController', 'metodo' => 'editar'],
    '/genero/excluir' => ['controller' => 'GeneroController', 'metodo' => 'excluir',],
    '/livro' => ['controller' => 'LivroController', 'metodo' => 'index'],
    '/livro/adicionar' => ['controller' => 'LivroController', 'metodo' => 'adicionar'],
    '/livro/editar' => ['controller' => 'LivroController', 'metodo' => 'editar'],
    '/livro/excluir' => ['controller' => 'LivroController', 'metodo' => 'excluir',],
];

// Verificação de existência da rota
if (array_key_exists($uri, $rotas)) {
    $controllerName = $rotas[$uri]['controller'];
    $metodo = $rotas[$uri]['metodo'];

    $controller = new $controllerName();
    $controller->$metodo();
} else {
    http_response_code(404);
    require __DIR__ . '/views/404.php';
}
