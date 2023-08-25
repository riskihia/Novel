<?php

namespace Tests\Feature\Novel;

use App\Services\NovelService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NovelServiceTest extends TestCase
{
    private NovelService $novelService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->novelService = $this->app->make(NovelService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }
}
