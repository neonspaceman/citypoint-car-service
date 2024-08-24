<?php

namespace Tests\ModelBuilders\Assertions;

use Illuminate\Database\Eloquent\Model;
use Tests\ModelBuilders\Exceptions\ModelBuildProcessHasNotStartedYetException;

final class ModelBuildProcessHasAlreadyStartedAssertion
{
    /**
     * @param class-string $modelClass
     *
     * @throws ModelBuildProcessHasNotStartedYetException
     */
    public static function assert(string $modelClass, ?Model $model): void
    {
        if (!$model) {
            throw new ModelBuildProcessHasNotStartedYetException($modelClass);
        }
    }
}
