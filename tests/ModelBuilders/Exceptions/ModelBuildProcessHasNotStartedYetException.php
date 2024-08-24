<?php

namespace Tests\ModelBuilders\Exceptions;

final class ModelBuildProcessHasNotStartedYetException extends \RuntimeException
{
    /**
     * @param class-string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $message = sprintf('The build process of %s has not started yet. Create a model first.', $modelClass);

        parent::__construct($message);
    }
}
