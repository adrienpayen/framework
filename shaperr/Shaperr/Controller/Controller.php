<?php

namespace Shaperr\Controller;

use Shaperr\Templating\Render;
use Shaperr\DependencyInjection\ContainerAware;

abstract class Controller extends ContainerAware
{
    use Render;
}