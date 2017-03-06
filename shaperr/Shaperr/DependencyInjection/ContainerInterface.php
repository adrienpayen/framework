<?php

namespace Shaperr\DependencyInjection;

interface ContainerInterface
{
    /**
     * @param $id
     * @param $service
     * @return mixed
     */
    public function set($id, $service);

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param $id
     * @return mixed
     */
    public function has($id);
}
