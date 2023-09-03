<?php

namespace Tests\Feature\Tag;

use App\Services\TagService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagServiceTest extends TestCase
{
    private TagService $tagService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tagService = $this->app->make(TagService::class);
    }   
    
    public function testSample()
    {
        self::assertTrue(true);
    }
}
