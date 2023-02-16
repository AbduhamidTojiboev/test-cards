<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMustEnterEmailAndPassword()
    {
        $this->json('POST', 'api/v1/auth/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "Validation errors.",
                "errors" => [
                    'email' => ["The email field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }

}
