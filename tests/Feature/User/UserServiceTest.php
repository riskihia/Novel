<?php

namespace Tests\Feature;

use App\Services\RequestService;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    private RequestService $requestService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->requestService = $this->app->make(RequestService::class);;
        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }
}
