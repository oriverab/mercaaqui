<?php
namespace App\Http\Controllers;
use app\Models\productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListaProducto extends Controller
{
    public function ListaProducto ()
    {
        $array = array();
        $resultset=DB::select("SELECT * from productos");
        $array= $resultset;
            
        echo json_encode($array);
        }
}
