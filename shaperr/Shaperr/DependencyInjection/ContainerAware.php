<?php

namespace Shaperr\DependencyInjection;

abstract class ContainerAware implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
}