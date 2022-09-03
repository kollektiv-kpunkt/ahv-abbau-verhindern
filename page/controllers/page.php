<?php
require __DIR__ . '/../vendor/autoload.php';

class Page {
    public $file;
    public $filename;
    public $parser;
    public $pageDetails;
    public $pageContent;

    function __construct($file, $filename, $parsedown) {
        $this->file = $file;
        $this->filename = $filename;
        $this->parser = $parsedown;
        $this->prepare();
    }

    function prepare() {
        $fileContents = json_decode(file_get_contents($this->file), true);
        $this->pageDetails = $fileContents['details'];
        foreach ($fileContents['content'] as $content) {
            switch ($content['type']) {
                case 'md':
                    $md = file_get_contents(__DIR__ . "/../public/pages/" . $content['content']);
                    $this->pageContent[] = $this->parser->text($md);
                    break;
                case "element":
                    $filename = __DIR__ . "/../public/elements/" . $content['content'] . ".php";
                    if (file_exists($filename)) {
                        ob_start();
                        require $filename;
                        $this->pageContent[] = ob_get_clean();
                    } else {
                        $this->pageContent[] = "Element not found: " . $content['content'] . "\n";
                    }
                    break;
            }
        }
    }
}