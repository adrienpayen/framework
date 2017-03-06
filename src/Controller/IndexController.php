<?php

namespace src\Controller;

use Shaperr\Controller\Controller;

class IndexController extends Controller
{
    public function IndexAction()
    {
        $this->render(
            'layout.html.twig',
            [
                "param" => "param"
            ]
        );
    }
}