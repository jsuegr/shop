<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
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
                'id' => 1
            ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
   /* public function testSearchASpecificProduct()
    {
        //checar pagina de inicio
       $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('GET', '/search', ['query' => 'Temporibus aspernatur esse']);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Temporibus aspernatur esse'
                ]);
            
    }*/

    public function testHome()
    {
        //checar pagina de inicio
        $user = User::find(1);
       $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200)
            ->assertSee('home');
            
    }

    public function testSeeProduct()
    {
        $response = $this->get('/products/2');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => 2
            ]);
    }

    public function testAdminProducts()
    {
        //checar pagina de inicio
       $user = User::find(3);
       $response = $this->actingAs($user)->get('/admin/products');
       $response->assertStatus(200)
            ->assertSee("hola");
            
    }

}
