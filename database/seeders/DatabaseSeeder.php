<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@yopmail.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'jefe',
            'email' => 'jefe@yopmail.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'empleado',
            'email' => 'empleado@yopmail.com',
            'password' => Hash::make('123456'),
        ]);

        // ---------------------------------------------------------------
        // Permissions
        // ---------------------------------------------------------------
        $createEmpleado = Permission::create(['name' => 'create.empleado']);
        $editEmpleado = Permission::create(['name' => 'edit.empleado']);
        $consultEmpleado = Permission::create(['name' => 'consult.empleado']);
        $searchEmpleado = Permission::create(['name' => 'search.empleado']);
        $destroyEmpleado = Permission::create(['name' => 'destroy.empleado']);

        $employeePermissions = [
            $createEmpleado,
            $editEmpleado,
            $consultEmpleado,
            $searchEmpleado,
            $destroyEmpleado,
        ];

        $createArea = Permission::create(['name' => 'create.area']);
        $editArea = Permission::create(['name' => 'edit.area']);
        $consultArea = Permission::create(['name' => 'consult.area']);
        $searchArea = Permission::create(['name' => 'search.area']);
        $destroyArea = Permission::create(['name' => 'destroy.area']);

        $areaPermissions = [
            $createArea,
            $editArea,
            $consultArea,
            $searchArea,
            $destroyArea,
        ];

        $createCargo = Permission::create(['name' => 'create.cargo']);
        $editCargo = Permission::create(['name' => 'edit.cargo']);
        $consultCargo = Permission::create(['name' => 'consult.cargo']);
        $searchCargo = Permission::create(['name' => 'search.cargo']);
        $destroyCargo = Permission::create(['name' => 'destroy.cargo']);

        $cargoPermissions = [
            $createCargo,
            $editCargo,
            $consultCargo,
            $searchCargo,
            $destroyCargo,
        ];

        $createRequerimiento = Permission::create(['name' => 'create.requerimiento']);
        $editRequerimiento = Permission::create(['name' => 'edit.requerimiento']);
        $consultRequerimiento = Permission::create(['name' => 'consult.requerimiento']);
        $searchRequerimiento = Permission::create(['name' => 'search.requerimiento']);
        $destroyRequerimiento = Permission::create(['name' => 'destroy.requerimiento']);

        $requerimientoPermissions = [
            $createRequerimiento,
            $editRequerimiento,
            $consultRequerimiento,
            $searchRequerimiento,
            $destroyRequerimiento,
        ];

        $createRol = Permission::create(['name' => 'create.rol']);
        $editRol = Permission::create(['name' => 'edit.rol']);
        $consultRol = Permission::create(['name' => 'consult.rol']);
        $searchRol = Permission::create(['name' => 'search.rol']);
        $destroyRol = Permission::create(['name' => 'destroy.rol']);

        $rolPermissions = [
            $createRol,
            $editRol,
            $consultRol,
            $searchRol,
            $destroyRol,
        ];

        $createPermission = Permission::create(['name' => 'create.permission']);
        $editPermission = Permission::create(['name' => 'edit.permission']);
        $consultPermission = Permission::create(['name' => 'consult.permission']);
        $searchPermission = Permission::create(['name' => 'search.permission']);
        $destroyPermission = Permission::create(['name' => 'destroy.permission']);

        $permissionPermissions = [
            $createPermission,
            $editPermission,
            $consultPermission,
            $searchPermission,
            $destroyPermission,
        ];

        // ---------------------------------------------------------------
        // Roles
        // ---------------------------------------------------------------

        $admin = Role::create(['name' => 'administrador']);
        $areaBoss = Role::create(['name' => 'jefeDeArea']);
        $employee = Role::create(['name' => 'empleado']);

        // ---------------------------------------------------------------
        // Assignate permissions to roles
        // ---------------------------------------------------------------

        $admin->syncPermissions(
            $employeePermissions,
            $areaPermissions,
            $cargoPermissions,
            $requerimientoPermissions,
            $rolPermissions,
            $permissionPermissions,
        );


        // ---------------------------------------------------------------
        // Assingn roles
        // ---------------------------------------------------------------
        User::find(1)->assignRole('administrador');
        User::find(2)->assignRole('jefeDeArea');
        User::find(3)->assignRole('empleado');
    }
}
