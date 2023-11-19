<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Raihan', $firstName);
        self::assertEquals('Presiden', $lastName);
        self::assertEquals('echo.raihanpresiden@gmail.com', $email);
        self::assertEquals('https://www.presidenwashil.com', $web);


    }
}
