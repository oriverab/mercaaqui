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
    $vendedor -> nombre = 'milton';
    $vendedor -> cedula = '1000323136';
    $vendedor -> email = 'nada@gmail.com';
    $vendedor -> telefono = '123443';
    $listaU[] = $vendedor;

    $list = (new vendedorcontroller)->getlistaUsuario($listaU);
    $this->assertSame($listaU, $list );
    }

    public function test_CrearV()
    {

    $vendedor = new vendedor();
    $vendedor -> id = 1; 
    $vendedor -> nombre = 'milton';
    $vendedor -> cedula = '1000323136';
    $vendedor -> email = 'nada@gmail.com';
    $vendedor -> telefono = '123443';
    $listaU[] = $vendedor;

    $list = (new vendedorcontroller)->getlistaUsuario($listaU);
    $this->assertSame($listaU, $list );
    }

    public function test_StoreV()
    { 
            $vendedor = new vendedor();
            $vendedor->id = 1;
            $vendedor->nombre = 'milton ';     
    
            $datos = (new vendedorcontroller)->createv(null, true);
            $this->assertSame($vendedor->nombre,  $datos->nombre);
        
    }

    public function test_get_vendedor_id()
    {
        $vendedor = (new vendedorcontroller)->createv(null, true);
        $data = (new vendedorcontroller)->getVendedorId(null, true);
        $this->assertSame($vendedor->id,  $data->id);
    }


    public function test_update_vendedor_id()
    {
        $vendedor = (new vendedorcontroller)->createv(null, true);
        $vendedor->nombre = 'milton';
        $data = (new vendedorcontroller)->updateVendedorId(null, 1, true);
        $this->assertSame($vendedor->nombre,  $data->nombre);
    }

   

    
}
