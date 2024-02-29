<?php

class main
{
    public $url;
    public $controllerName = 'index';
    public $methodName = 'index';
    public $controllerPath = 'app/controllers/';
    public $controller;

    public function __construct()
    {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    public function getUrl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
        if ($this->url != NULL) {
            $this->url = rtrim($this->url, "/");
            $this->url = explode("/", filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    public function loadController()
    {
        if (!isset($this->url[0])) {
            include $this->controllerPath . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
        } else {
            $this->controllerName = $this->url[0];
            $fileName = $this->controllerPath . $this->controllerName . '.php';
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->controllerName)) {
                    $this->controller = new $this->controllerName();
                } else {
                    $this->handleError();
                }
            } else {
                $this->handleError();
            }
        }
    }

    public function callMethod()
    {
        if (isset($this->url[2])) {
            $this->methodName = $this->url[1];
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}($this->url[2]);
            } else {
                $this->handleError();
            }
        } else {
            if (isset($this->url[1])) {
                $this->methodName = $this->url[1];
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    $this->handleError();
                }
            } else {
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    $this->handleError();
                }
            }
        }
    }

    public function handleError()
    {
        // Redirect to a custom error page
        header('Location:' . BASE_URL . '/index/notfound');
        exit();
    }
}

?>
