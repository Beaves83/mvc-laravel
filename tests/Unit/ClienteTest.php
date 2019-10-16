<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator as Faker;
use App\Cliente;
use Illuminate\Contracts\Auth\Authenticatable;

class ClienteTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    protected function setUp()
    {
        parent::setUp();
        $this->cliente = factory(Cliente::class)->create();
    }
    
    public function testClientesIndex()
    {       
        $response = $this->get(route('clientes.index'));
        $response->assertStatus(200);
    }
    
    
    /** @test */
    public function testListadoClientes()
    {       
        $response = $this->get(route('clientes.all')); //.$this->faker->numberBetween(0,50)
        $response->assertStatus(200);
    }
        
    /** @test */
//    public function testCrearCliente()
//    {
//        $fechaAleatoria = $this->faker->date;
//        
//        $data = [
//            'codigo'  => $this->faker->unique()->postcode,
//            'razonSocial' => $this->faker->company(2), 
//            'cif' => $this->faker-> unique()->randomNumber($nbDigits = NULL, $strict = false), 
//            'direccion' => $this->faker->address(3), 
//            'municipio' => $this->faker->citySuffix(2), 
//            'provincia' => $this->faker->city(1), 
//            'fechainiciocontrato' => $fechaAleatoria, 
//            'fechafincontrato' => $this->faker->date($format ='Y-m-d', $max = '+2 years'),  //dateTimeBetween($startDate = $fechaAleatoria, $endDate = '+2 years', $timezone = null), 
//            'numeroreconocimientoscontratados'=> $this->faker->numberBetween(0,500), 
//            'activo'=> $this->faker->boolean,
//            'numeroreconocimientosutilizados' => $this->faker->numberBetween(0,500)
//        ];  
//        
//        $response = $this
//            ->postJson(route('clientes.store'), $data);
//        
//        //dd($response);
//        //$errors = session('errors');
//        //$this->assertSessionHasErrors();
//        $response->assertStatus(200);
//    }
}
