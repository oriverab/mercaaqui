<?php
namespace Tests\Unit\controlador;

use App\Models\ventas;

use App\Http\Controllers\ventascontroller;
use PHPUnit\Framework\Test;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class listaVTestVe extends TestCase
{ 

    use RefreshDatabase;

    public function test_listaVe()
    {

    $ventas = new ventas();
    $ventas -> id = 1; 
    $ventas -> nombre = 'milton';
    $ventas -> img = 1000323136;
    $ventas -> precio = 1001;
    $ventas -> cantidad = 100;
    $ventas -> total = 1100;
    $ventas -> vendedor = "felipe";
    $ventas -> productos_id = 1;
    
    $listaVe[] = $ventas;

    $list = (new ventascontroller)->getlistaventas($listaVe);
    $this->assertSame($listaVe, $list );
    }
}