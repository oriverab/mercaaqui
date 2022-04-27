<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productos;
use App\Models\vendedor;
class ventas extends Model
{
    public function VentasProductos(){
        return $this->BelongsToMany(productos::class);
    }

    public function VentasVendedores(){
        return $this->BelongsToMany(vendedor::class);
    }

}
