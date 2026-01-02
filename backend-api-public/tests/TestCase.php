<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\utils\Repository;

abstract class TestCase extends BaseTestCase
{
    public string $url;

    protected function setUp(): void
    {
        parent::setUp();
        $this->url = config('api.version');
        Repository::initData();
    }

    protected function tearDown(): void
    {
        Repository::clearAllData();
        parent::tearDown();
    }
}
