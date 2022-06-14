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
    $productos -> nombre = 'Speed Max';
    $productos -> precio = 1000323136;
    $productos -> stock = 100;
    $listaP[] = $productos;

    $list = (new productoscontroller)->getlistaProductos($listaP);
    $this->assertSame($listaP, $list );
    }

    public function test_store_productos()
    {
        $productos = new productos();
        $productos->id = 1;
        $productos->nombre = 'Speed Max';

        $data = (new productoscontroller)->createP(null, true);
        $this->assertSame($productos->nombre,  $data->nombre);
    }

    /**
     * A test to getproduct by its id
     *
     * @return void
     */
    public function test_get_productos_id()
    {
        $productos = (new productoscontroller)->createP(null, true);
        $data = (new productoscontroller)->getProductosId(null, true);
        $this->assertSame($productos->id,  $data->id);
    }

    /**
     * Test for update Product function
     *
     * @return void
     */
    public function test_update_productos_id()
    {
        $productos = (new productoscontroller)->createP(null, true);
        $productos->nombre = 'awa';
        $data = (new productoscontroller)->updateProductosId(null, 1, true);
        $this->assertSame($productos->nombre,  $data->nombre);
    }

    /**
     * Test for destroy Product function
     *
     * @return void
     */
  
    
}