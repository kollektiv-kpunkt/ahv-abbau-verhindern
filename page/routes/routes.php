<?php
require(__DIR__ . '/../vendor/autoload.php');
use Pecee\SimpleRouter\SimpleRouter as Router;
require(__DIR__ . '/../controllers/page.php');
$parsedown = new Parsedown();

$files = glob(__DIR__ . "/../public/pages/*.json");
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../compilation_cache',
    'debug' => true,
]);

foreach ($files as $file) {
    $filename = basename($file);

    if ($filename == "index.json") {
        $path = "/";
    } else {
        $path = "/" . strtolower(substr($filename, 0, -5));
    }

    Router::get($path, function() use ($file, $filename, $parsedown, $twig) {
        $page = new Page($file, $filename, $parsedown);
        echo $twig->render('index.html', ['the' => 'variables', 'go' => 'here']);
        exit;
    });
}

Router::get("/{exception}", function($exception) {
    header("HTTP/1.0 404 Not Found");
    echo "Exception: {$exception}";
});