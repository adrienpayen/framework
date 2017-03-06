<?php

namespace Shaperr\Controller;

use Shaperr\Templating\Render;
use Shaperr\DependencyInjection\ContainerAware;

abstract class Controller extends ContainerAware
{
    use Render;

    public function getDatly()
    {
        if (!$this->container->has('datly')) {
            // todo:
        }

        return $this->container->get('datly');
    }
}