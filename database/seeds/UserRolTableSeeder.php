<?php

use Illuminate\Database\Seeder;
use App\UserRol;
class UserRolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserRol::create([
            'name' => 'client',
            'description' => 'Rol dedicado para clientes del sistema. Solo permite hacer compras y manegar su cuenta'
        ]);


        UserRol::create([
            'name' => 'seller',
            'description' => 'Rol dedicado para proveedores del sistema. Tiene acceso al módulo de ventas y de compras'
        ]);
        
        UserRol::create([
        	'name' => 'admin',
        	'description' => 'Rol para administrador de página. Tiene acceso total al sistema'
        ]);

        
    }
}