<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

abstract class FeatureTestCase extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        URL::forceRootUrl('https://localhost');
    }

    protected function assertPaginationMetaData(mixed $metaData): void
    {
        self::assertIsArray($metaData);

        self::assertArrayHasKey('current_page', $metaData);
        self::assertArrayHasKey('from', $metaData);
        self::assertArrayHasKey('last_page', $metaData);
        self::assertArrayHasKey('links', $metaData);
        self::assertArrayHasKey('path', $metaData);
        self::assertArrayHasKey('per_page', $metaData);
        self::assertArrayHasKey('to', $metaData);
        self::assertArrayHasKey('total', $metaData);
    }

    protected function assertPaginationLinksData(mixed $linksData): void
    {
        self::assertIsArray($linksData);

        self::assertArrayHasKey('first', $linksData);
        self::assertArrayHasKey('last', $linksData);
        self::assertArrayHasKey('prev', $linksData);
        self::assertArrayHasKey('next', $linksData);
    }
}
