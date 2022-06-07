<?php
namespace Tests\Unit\controlador;

use App\Models\productos;

use App\Http\Controllers\productoscontroller;
use PHPUnit\Framework\Test;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class listaVTestP extends TestCase
{ 

    use RefreshDatabase;

    public function test_listaP()
    {

    $productos = new productos();
    $productos -> id = 1; 
    $productos -> nombre = 'Cristian Bolanos';
    $productos -> precio = 1000323136;
    $productos -> stock = 100;
    $listaP[] = $productos;

    $list = (new productoscontroller)->getlistaProductos($listaP);
    $this->assertSame($listaP, $list );
    }
}

