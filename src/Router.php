<?php
namespace App;

class Router {

    private \AltoRouter $router;
    private string $viewsPath;

    public function __construct(string $viewsPath)
    {
        $this->router = new \AltoRouter();
        $this->viewsPath = $viewsPath;
    }

    public function get(string $url, string $path, string $name): self
    {
        $this->router->map("GET", $url, $path, $name);
        return $this;
    }

    public function getAndPost(string $url, string $path, string $name): self
    {
        $this->router->map('GET|POST', $url, $path, $name);
        return $this;
    }

    public function url(string $route, array $params = []): string
    {
        return $this->router->generate($route, $params);
    }

    public function run() {
        $match = $this->router->match();
        $path = $match['target'];
        $layout = '/layout/main.php';
        $scripts = [];
        $router = $this;

        if($match['name'] == "root") {
            header('Location: ' . $this->url('screens'));
            return;
        }

        ob_start();
        require $this->viewsPath . $path;
        $content = ob_get_clean();

        require dirname(__DIR__) . '/views/layout/default.php';
    }

}
