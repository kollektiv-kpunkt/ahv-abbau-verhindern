<?php
require(__DIR__ . '/../vendor/autoload.php');
use Pecee\SimpleRouter\SimpleRouter as Router;
require(__DIR__ . '/../controllers/page.php');
$parsedown = new Parsedown();

$files = array_diff(scandir(__DIR__ . "/../public/pages"), array('.', '..'));

foreach ($files as $file) {

    if ($file == "index.md") {
        $path = "/";
    } else {
        $path = "/" . strtolower(substr($file, 0, -3));
    }

    Router::get($path, function() use ($file, $parsedown) {
        $page = new Page($file);
        echo($parsedown->text($page->pageContent));
        exit;
    });
}

Router::get("/{exception}", function($exception) {
    header("HTTP/1.0 404 Not Found");
    echo "Exception: {$exception}";
});