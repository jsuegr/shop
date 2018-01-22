<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //checar pagina de inicio
		$response = $this->get('/');


        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' => 'Et'
            ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchASpecificProduct()
    {
        //checar pagina de inicio
       $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('GET', '/search', ['query' => 'Temporibus aspernatur esse']);

        $response->assertStatus(200);
            
    }
}
