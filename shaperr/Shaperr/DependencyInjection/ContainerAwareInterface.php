<?php

namespace Shaperr\DependencyInjection;

interface ContainerAwareInterface
{
    /**
     * Sets the container.
     *
     * @param ContainerInterface
     */
    public function setContainer(ContainerInterface $container);
}