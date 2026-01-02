<?php

namespace Tests;

use Domain\Auth\Actions\LoginAction;
use Domain\Shared\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\utils\Helper;

abstract class MemberTestCase extends BaseTestCase
{
    public string $urlAuth;
    public string $urlMember;
    public string $token;

    protected function setUp(): void
    {
        parent::setUp();
        Helper::insertUser();
        $this->urlAuth = config('api.version') . '/auth';
        $this->urlMember = config('api.version') . '/member';
        $user = User::where('username', Helper::USERNAME)->first();
        $this->token = LoginAction::generateJwt($user);
    }

    protected function tearDown(): void
    {
        Helper::deleteUser();
        parent::tearDown();
    }
}
