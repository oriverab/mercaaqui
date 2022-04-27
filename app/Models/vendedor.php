<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ventas;
class vendedor extends Model
{
    public function VendedoresVentas(){
        return $this->BelongsToMany(ventas::class);
    }
}
