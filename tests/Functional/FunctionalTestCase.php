<?php

namespace Tests\Functional;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

abstract class FunctionalTestCase extends TestCase
{
    use DatabaseTransactions;
}
