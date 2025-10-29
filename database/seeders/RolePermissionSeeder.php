<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $adminRole = Role::create(['name'=>'admin']);
        $docenteRole = Role::create(['name'=>'docente']);
        $editorRole = Role::create(['name'=>'editor']); 

        //Permisos

        //--Permisos para categorias

        $permissionIndexCategory = Permission::create(['name'=>'view categories']);
        $permissionCreateCategory = Permission::create(['name'=>'create categories']);
        $permissionEditCategory = Permission::create(['name'=>'edit categories']);
        $permissionDeleteCategory = Permission::create(['name'=>'delete categories']);

        //--Permisos para Servicios

        $permissionIndexService = Permission::create(['name'=>'view services']);
        $permissionCreateService = Permission::create(['name'=>'create services']);
        $permissionEditService = Permission::create(['name'=>'edit services']);
        $permissionDeleteService = Permission::create(['name'=>'delete services']);

        //--Permisos para Posts

        $permissionIndexPost = Permission::create(['name'=>'view posts']);
        $permissionCreatePost = Permission::create(['name'=>'create posts']);
        $permissionEditPost = Permission::create(['name'=>'edit posts']);
        $permissionDeletePost = Permission::create(['name'=>'delete posts']);
        $permissionPublisPost = Permission::create(['name'=>'publish posts']);

        //--Permisos para usuarios

        $permissionIndexUser = Permission::create(['name'=>'view users']);
        $permissionCreateUser = Permission::create(['name'=>'create users']);
        $permissionEditUser = Permission::create(['name'=>'edit users']);
        $permissionDeleteUser = Permission::create(['name'=>'delete users']);
        $permissionAssingRoles = Permission::create(['name'=>'delete roles']);
        $permissionAssingPermissions = Permission::create(['name'=>'assign permissions']);


        // Asisgnar permisos a roles

        // Rol admin: todos los permisos
        
        $adminRole->givePermissionTo(Permission::all());
        
        
        // Rol Editor: permisos especificos

        $editorRole->givePermissionTo([

            $permissionIndexCategory,
            $permissionIndexService,
            $permissionIndexPost,
            $permissionCreatePost,
            $permissionEditPost,
            $permissionPublisPost,

        ]);
        
        // Rol docente: permisos de visual

        $docenteRole->givePermissionTo([

            $permissionIndexCategory,
            $permissionIndexPost,
            $permissionIndexService,

        ]);

    }

}
