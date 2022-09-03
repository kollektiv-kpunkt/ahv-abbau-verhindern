<?php
require __DIR__ . '/../vendor/autoload.php';

class Page {
    public $file;
    public $filename;
    public $parser;
    public $template;
    public $URL;
    public $root;
    public $title;
    public $description;
    public $OG;
    public $content;

    function __construct($file, $filename, $parsedown) {
        $this->file = $file;
        $this->filename = $filename;
        $this->parser = $parsedown;
        $this->pageURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $this->root = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
        $this->prepare();
    }

    function prepare() {
        $fileContents = json_decode(file_get_contents($this->file), true);
        $this->template = $fileContents['details']['template'];
        $this->title = $fileContents['details']['title'];
        $this->description = $fileContents['details']['description'];
        if (!isset($fileContents['details']['og'])) {
            $this->OG = $this->pageURL . "assets/images/og/default.jpg";
        } else {
            if (strpos($fileContents['details']['og'], 'http') !== false) {
                $this->OG = $fileContents['details']['og'];
            } else {
                $this->OG = $this->pageURL . $fileContents['details']['og'];
            }
        }


        foreach ($fileContents['content'] as $content) {
            switch ($content['type']) {
                case 'md':
                    $md = file_get_contents(__DIR__ . "/../public/pages/markdown/" . $content['content']);
                    $this->content[] = [
                        "type" => "md",
                        "content" => $this->parser->text($md)
                    ];
                    break;
                case "block":
                    $this->content[] = [
                        "type" => "block",
                        "block" => "elements/{$content['content']}.html"
                    ];
                    break;
            }
        }
    }
}