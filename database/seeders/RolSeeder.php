<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'Tecnico']);
        $role3 = Role::create(['name'=> 'Usuario']);
        

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'relevamientos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'relevamientos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'relevamientos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'relevamientos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'categorias.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categorias.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categorias.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'sectors.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'sectors.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sectors.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sectors.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'sedes.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'sedes.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sedes.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sedes.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'articulos.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'articulos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'articulos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'articulos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'marcas.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'marcas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'marcas.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'marcas.destroy'])->syncRoles([$role1]);


    
    }
}
