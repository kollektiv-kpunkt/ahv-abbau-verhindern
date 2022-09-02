<?php
require __DIR__ . '/../vendor/autoload.php';

class Page {
    public $file;
    public $pageDetails;
    public $pageContent;

    function __construct($file) {
        $this->file = $file;
        $this->setDetails();
        $this->setContent();
    }

    public function setDetails() {
        $file = file_get_contents(__DIR__ . "/../public/pages/" . $this->file);
        $file = explode("\n", explode("___", $file)[0]);
        foreach($file as $detail) {
            if (strlen($detail) < 2) {
                continue;
            }
            list($k,$v) = explode('::', $detail);
            $this->pageDetails[$k] = $v;
        }
        if (!isset($this->pageDetails["pageOG"])) {
            $this->pageDetails["pageOG"] = "/img/og/default.jpg";
        }
        $this->pageDetails["pageURL"] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    }

    public function setContent() {
        $file = file_get_contents(__DIR__ . "/../public/pages/" . $this->file);
        $file = explode("___", $file)[1];
        $this->pageContent = $file;
    }
}