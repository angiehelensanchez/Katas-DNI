<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LetterTest extends TestCase
{

    public function test_CheckIfReturnCorrectLetterWithApi() {
        $data = ['letter' => 'Q'];

        $response = $this->getJson(route('index', ['number' =>53668906]));
        
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfReturnErrorWithApi() {
        $data = ['message' => 'Error en los datos'];
        $response = $this->getJson(route('index', ['number' => "es un error"]));
        
        $response->assertStatus(400)
            ->assertJsonFragment($data);
    }
}
