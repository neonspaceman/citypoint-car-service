<?php

namespace Tests\ModelBuilders\Exceptions;

final class ModelBuildProcessHasAlreadyStartedException extends \RuntimeException
{
    /**
     * @param class-string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $message = sprintf('The building process of %s has already started. Reset the builder to continue.', $modelClass);

        parent::__construct($message);
    }
}
