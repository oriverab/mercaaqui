<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ventas;
class productos extends Model
{
    public function ProductosVentas(){
        return $this->BelongsToMany(ventas::class);
    }
}
