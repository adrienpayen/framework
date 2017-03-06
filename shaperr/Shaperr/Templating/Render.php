<?php

namespace Shaperr\Templating;

trait Render
{
    private $view;
    private $template;

    /**
     * View constructor.
     *
     * @param string $view
     * @param string $template
     */
    public function __construct($view = "index", $template = "frontend")
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    /**
     * @param $view
     * @return string
     */
    private function setView($view)
    {
        if (file_exists( "views/" . $view . ".view.php" )) {
            return $this->view = $view . ".view.php";
        }

        die("La vue n'existe pas");
    }

    /**
     * @param $template
     * @return string
     */
    private function setTemplate($template)
    {
        if (file_exists( "views/" . $template . ".layout.php" )) {
            return $this->template = $template . ".layout.php";
        }

        die("Le template n'existe pas");
    }

    /**
     * @param $view
     * @param array $params
     */
    public function render($view, array $params)
    {
        $this->setView($view);

        foreach ($params as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    public function __destruct()
    {
        extract($this->data);
        include "views/" . $this->template;
    }
}