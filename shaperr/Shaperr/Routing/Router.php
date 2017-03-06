<?php

namespace Framework\Framework\Routing;

/**
 * Class Routing
 *
 * @author Adrien PAYEN <adrien.payen2@gmail.com>
 */
class Router
{
    private $uriExploded;

    private $controller;
    private $controllerName;
    private $action;
    private $actionName;

    private $params;

    public function __construct()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $uri = preg_replace("#" . BASE_PATH_PATTERN . "#i", "", $uri, 1);
        $this->uriExploded = explode("/", trim($uri, "/"));
        $this->setController();
        $this->setAction();
        $this->setParams();
        $this->runRoute();
    }

    public function setController()
    {
        $this->controller = (empty($this->uriExploded[0])) ? "Index" : ucfirst($this->uriExploded[0]);
        $this->controllerName = $this->controller . "Controller";
        unset($this->uriExploded[0]);
    }

    public function setAction()
    {
        $this->action = (empty($this->uriExploded[1])) ? "index" : $this->uriExploded[1];
        $this->actionName = $this->action . "Action";
        unset($this->uriExploded[1]);
    }

    public function setParams()
    {
        $this->params = array_merge(array_values($this->uriExploded), $_POST);
    }


    public function checkRoute()
    {
        $pathController = "controllers/" . $this->controllerName . ".php";

        if (!file_exists($pathController)) {
            echo "Le fichier du controller n'existe pas";
            return false;
        }

        include $pathController;

        if (!class_exists($this->controllerName)) {
            echo "Le fichier du controller existe mais il n'y a pas de classe";
            return false;
        }
        if (!method_exists($this->controllerName, $this->actionName)) {
            echo "L'action n'existe pas";
            return false;
        }

        return true;
    }


    public function run()
    {
        if ($this->checkRoute()) {
            $controller = new $this->controllerName();
            $controller->{$this->actionName}($this->params);
        } else {
            $this->page404();
        }
    }

    public function page404()
    {
        die("Erreur 404");
    }
}
