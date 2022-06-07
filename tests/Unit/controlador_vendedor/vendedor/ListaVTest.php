<?php
namespace Tests\Unit\controlador;

use App\Models\vendedor;

use App\Http\Controllers\vendedorcontroller;
use PHPUnit\Framework\Test;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class listaVTestV extends TestCase
{ 

    use RefreshDatabase;

    public function test_listaV()
    {

    $vendedor = new vendedor();
    $vendedor -> id = 1; 
    $vendedor -> nombre = 'Cristian Bolanos';
    $vendedor -> cedula = '1000323136';
    $vendedor -> email = 'nada@gmail.com';
    $vendedor -> telefono = '123443';
    $listaU[] = $vendedor;

    $list = (new vendedorcontroller)->getlistaUsuario($listaU);
    $this->assertSame($listaU, $list );
    }
}

