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
        $role = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'role:viewAny']);
        Permission::create(['name' => 'role:view']);
        Permission::create(['name' => 'role:assign']);
        Permission::create(['name' => 'role:create']);
        Permission::create(['name' => 'role:update']);
        Permission::create(['name' => 'role:delete']);
        Permission::create(['name' => 'role:restore']);
        Permission::create(['name' => 'permission:viewAny']);
        Permission::create(['name' => 'permission:view']);
        Permission::create(['name' => 'permission:assign']);
        Permission::create(['name' => 'permission:create']);
        Permission::create(['name' => 'permission:update']);
        Permission::create(['name' => 'permission:delete']);
        Permission::create(['name' => 'permission:restore']);
        Permission::create(['name' => 'user:viewAny']);
        Permission::create(['name' => 'user:view']);
        Permission::create(['name' => 'user:create']);
        Permission::create(['name' => 'user:update']);
        Permission::create(['name' => 'user:delete']);
        Permission::create(['name' => 'user:restore']);

        $statsPermission = Permission::create(['name' => 'stats:view']);


        $role = Role::create(['name' => 'editor']);
        $permissions = [
            Permission::create(['name' => 'post:viewAny']),
            Permission::create(['name' => 'post:view']),
            Permission::create(['name' => 'post:create']),
            Permission::create(['name' => 'post:update']),
            Permission::create(['name' => 'post:delete']),
            Permission::create(['name' => 'post:restore']),
            Permission::create(['name' => 'news:viewAny']),
            Permission::create(['name' => 'news:view']),
            Permission::create(['name' => 'news:create']),
            Permission::create(['name' => 'news:update']),
            Permission::create(['name' => 'news:delete']),
            Permission::create(['name' => 'news:restore']),
        ];
        $role->syncPermissions($permissions);


        $role = Role::create(['name' => 'customer']);

        $role = Role::create(['name' => 'helpdesk-support']);
        $helpDeskPermissions = [
            Permission::create(['name' => 'chat:viewAny']),
            Permission::create(['name' => 'chat:view']),
            Permission::create(['name' => 'chat:create']),
            Permission::create(['name' => 'chat:update']),
            Permission::create(['name' => 'chat:delete']),
            Permission::create(['name' => 'chat:restore']),
            Permission::create(['name' => 'email:viewAny']),
            Permission::create(['name' => 'email:view']),
            Permission::create(['name' => 'email:create']),
            Permission::create(['name' => 'email:update']),
            Permission::create(['name' => 'email:delete']),
            Permission::create(['name' => 'email:restore']),
        ];
        $role->syncPermissions($helpDeskPermissions);

        $shopManager = Role::create(['name' => 'shop-manager']);
        $shopManager->syncPermissions([
            Permission::create(['name' => 'order:viewAny']),
            Permission::create(['name' => 'order:view']),
            Permission::create(['name' => 'order:create']),
            Permission::create(['name' => 'order:update']),
            Permission::create(['name' => 'order:delete']),
            Permission::create(['name' => 'order:restore']),
            Permission::create(['name' => 'product:viewAny']),
            Permission::create(['name' => 'product:view']),
            Permission::create(['name' => 'product:create']),
            Permission::create(['name' => 'product:update']),
            Permission::create(['name' => 'product:delete']),
            Permission::create(['name' => 'product:restore']),
            Permission::create(['name' => 'stock:viewAny']),
            Permission::create(['name' => 'stock:view']),
            Permission::create(['name' => 'stock:create']),
            Permission::create(['name' => 'stock:update']),
            Permission::create(['name' => 'stock:delete']),
            Permission::create(['name' => 'stock:restore']),
            Permission::create(['name' => 'category:viewAny']),
            Permission::create(['name' => 'category:view']),
            Permission::create(['name' => 'category:create']),
            Permission::create(['name' => 'category:update']),
            Permission::create(['name' => 'category:delete']),
            Permission::create(['name' => 'category:restore']),
            Permission::create(['name' => 'review:viewAny']),
            Permission::create(['name' => 'review:view']),
            Permission::create(['name' => 'review:create']),
            Permission::create(['name' => 'review:update']),
            Permission::create(['name' => 'review:delete']),
            Permission::create(['name' => 'review:restore']),
            Permission::create(['name' => 'attribute:viewAny']),
            Permission::create(['name' => 'attribute:view']),
            Permission::create(['name' => 'attribute:create']),
            Permission::create(['name' => 'attribute:update']),
            Permission::create(['name' => 'attribute:delete']),
            Permission::create(['name' => 'attribute:restore']),
            Permission::create(['name' => 'value:viewAny']),
            Permission::create(['name' => 'value:view']),
            Permission::create(['name' => 'value:create']),
            Permission::create(['name' => 'value:update']),
            Permission::create(['name' => 'value:delete']),
            Permission::create(['name' => 'value:restore']),
            Permission::create(['name' => 'delivery-method:viewAny']),
            Permission::create(['name' => 'delivery-method:view']),
            Permission::create(['name' => 'delivery-method:switch']),
            Permission::create(['name' => 'delivery-method:create']),
            Permission::create(['name' => 'delivery-method:update']),
            Permission::create(['name' => 'delivery-method:delete']),
            Permission::create(['name' => 'delivery-method:restore']),
            Permission::create(['name' => 'payment-type:viewAny']),
            Permission::create(['name' => 'payment-type:view']),
            Permission::create(['name' => 'payment-type:switch']),
            Permission::create(['name' => 'payment-type:create']),
            Permission::create(['name' => 'payment-type:update']),
            Permission::create(['name' => 'payment-type:delete']),
            Permission::create(['name' => 'payment-type:restore']),
            Permission::create(['name' => 'discount:create']),
        ]);

        $role->syncPermissions($helpDeskPermissions);
        $role->givePermissionTo($statsPermission);
    }
}
