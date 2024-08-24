<?php

namespace Tests\ModelBuilders\Assertions;

use Illuminate\Database\Eloquent\Model;
use Tests\ModelBuilders\Exceptions\ModelBuildProcessHasAlreadyStartedException;

final class ModelBuildProcessHasNotStartedYetAssertion
{
    /**
     * @throws ModelBuildProcessHasAlreadyStartedException
     */
    public static function assert(?Model $model): void
    {
        if ($model) {
            throw new ModelBuildProcessHasAlreadyStartedException($model::class);
        }
    }
}
