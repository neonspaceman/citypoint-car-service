<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @template T
     *
     * @param class-string<T> $className
     *
     * @return T
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    final protected function getService(string $className): object
    {
        $service = $this->app->get($className);
        assert($service instanceof $className);

        return $service;
    }
}
