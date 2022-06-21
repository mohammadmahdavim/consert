<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        $superpermissions = [];
        foreach ($permissions as $permission) {
            $superpermissions[] = $permission->name;
        }
        $lists = [
            0 => [
                'name' => 'super-admin',
                'label' => 'یزنامه نویس',
                'permissions' => $superpermissions
            ],
            1 => [
                'name' => 'admin',
                'label' => 'مدیر',
                'permissions' => [
                    'finance',
                    'site',
                    'slider',
                    'service',
                    'service-show',
                    'blog',
                    'about',
                    'contact',
                    'finance-list',
                    'finance-create',
                    'finance-consult',
                    'consult-list',
                    'consult-create',
                    'consult-show',
                    'student-list',
                    'student-create',
                    'call-list',
                    'call-create',
                    'content-list',
                    'content-create',
                    'content-show',
                    'program-list',
                    'program-create',
                    'program-show',
                ]
            ],
            2 => [
                'name' => 'consult',
                'label' => 'مشاور',
                'permissions' => [
                    'service-show',
                    'finance-consult',
                    'consult-show',
                    'student-list',
                    'student-create',
                    'call-list',
                    'call-create',
                    'content-list',
                    'content-create',
                    'content-show',
                    'program-list',
                    'program-create',
                    'program-show',
                    'finance-consult-show',
                ]
            ],
            3 => [
                'name' => 'student',
                'label' => 'دانش آموز',
                'permissions' => [
                    'service-show',
                    'service-show-student',
                    'finance-student-show',
                    'consult-show',
                    'content-list',
                    'content-show',
                    'program-show',
                    'program-show-student',
                    'consult-show-student',
                ]
            ],

        ];
        foreach ($lists as $item) {
            $role = \Spatie\Permission\Models\Role::where('name', $item['name'])->first();
            if (!$role) {
                $role = \Spatie\Permission\Models\Role::create([
                    'name' => $item['name'],
                ]);
            }
            $ids = [];
            foreach ($item['permissions'] as $permission) {
                $secret = \Spatie\Permission\Models\Permission::where('name', $permission)->pluck('id')->first();
                if ($secret) {
                    $ids[] = $secret;
                }
            }
            $role->syncPermissions($ids);
        }
    }
}
