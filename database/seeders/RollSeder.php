<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RollSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admon =Role::create(["name"=>'administrador']);
        $vendedores=Role::create(["name"=>'vendedor']);

        Permission::create(['name'=>'menuadministrador'])->syncRoles($admon);
        Permission::create(['name'=>'menuvendedor'])->syncRoles($vendedores);


        Permission::create(['name'=>'veradmin'])->syncRoles($admon);
        Permission::create(['name'=>'vervendedor'])->syncRoles($vendedores);



    }
}
