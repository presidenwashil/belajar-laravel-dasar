<?php

namespace Tests\Feature;

use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection()
    {
        $foo1 = $this->app->make(Foo::class); //new Foo()
        $foo2 = $this->app->make(Foo::class); //new Foo()

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo1->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testBind()
    {
        // $person = $this->app->make(Person::class); //new Person()
        // self::assertNotNull($person);
        $this->app->bind(Person::class, function ($app) {
            return new Person("Raihan", "Presiden");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Raihan', $person1->firstName);
        self::assertEquals('Raihan', $person2->firstName);
        self::assertNotSame($person1, $person2);

    }

}
