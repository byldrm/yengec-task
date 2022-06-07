<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;

    /**
     * Test valid email.
     *
     * @return void
     */
    public function test_valid_email()
    {

        $register = [
            'email' => 'usermail.com',
        ];

        $this->json('POST', 'api/register',$register)
            ->assertInvalid([
                'email'
            ]);
    }

    /**
     * Test required name.
     *
     * @return void
     */
    public function test_required_name()
    {
        $register = [
        ];

        $this->json('POST', 'api/register',$register)
            ->assertInvalid([
                'name'
            ]);
    }

    /**
     * Test successful registration.
     *
     * @return void
     */
    public function test_successful_registration()
    {
        $userData = [
            "name" => "John Doe",
            "email" => $this->faker->unique()->safeEmail,
            "password" => "demo12345"
        ];

        $this->json('POST', 'api/register', $userData,['Accept' => 'application/json'])
            ->assertJsonStructure([
                "data" => [
                    'name',
                    'token'
                ],
                "message"
            ]);
    }

}
