<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            'role' => [
                [
                    'name' => 'role-list',
                    'label' => 'مدیریت نقش',
                ],
                [
                    'name' => 'role-create',
                    'label' => 'ایجاد نقش',
                ],
                [
                    'name' => 'role-edit',
                    'label' => 'ویرایش نقش',
                ],
                [
                    'name' => 'role-delete',
                    'label' => 'حذف نقش',
                ],
                [
                    'name' => 'test_programmer',
                    'label' => 'مدیریت آزمون ها',
                ],
            ],
            'site' => [
                [
                    'name' => 'site',
                    'label' => 'مدیریت سایت',
                ],
                [
                    'name' => 'slider',
                    'label' => 'مدیریت اسلایدر ها',
                ],
                [
                    'name' => 'service',
                    'label' => 'مدیریت دوره ها',
                ],
                [
                    'name' => 'service-show',
                    'label' => 'مشاهده دوره ',
                ],
                [
                    'name' => 'blog',
                    'label' => 'مدیریت وبلاگ ها',
                ],
                [
                    'name' => 'about',
                    'label' => 'مدیریت درباره ما',
                ],
                [
                    'name' => 'contact',
                    'label' => 'مدیریت درخواست  ها',

                ],

            ],
            'finance' => [
                [
                    'name' => 'finance',
                    'label' => 'مالی',
                ],
                [
                    'name' => 'finance-list',
                    'label' => 'مشاهده واریز ها',
                ],
                [
                    'name' => 'finance-create',
                    'label' => 'واریز جدید',
                ],
                [
                    'name' => 'finance-consult',
                    'label' => 'واریز مشاور',
                ],
                [
                    'name' => 'finance-consult-show',
                    'label' => 'مالی مشاور',
                ],
                [
                    'name' => 'finance-student-show',
                    'label' => 'مالی دانش آموز',
                ],
            ],
            'consult' => [
                [
                    'name' => 'consult-list',
                    'label' => 'لیست مشاوران',
                ],
                [
                    'name' => 'consult-create',
                    'label' => 'ایجاد مشاور',
                ],
                [
                    'name' => 'consult-show',
                    'label' => 'مشاهده مشاور',
                ],
                [
                    'name' => 'consult-show-student',
                    'label' => 'مشاهده مشاور دانش‌آموز',
                ],
            ],
            'student' => [
                [
                    'name' => 'student-list',
                    'label' => 'لیست دانش آموزان ',
                ],
                [
                    'name' => 'service-show-student',
                    'label' => 'دوره دانش آموز',
                ],
                [
                    'name' => 'student-create',
                    'label' => 'ایجاد دانش آموز ',
                ],

            ],
            'call' => [
                [
                    'name' => 'call-list',
                    'label' => 'مشاهده اسکرین تماس ها',
                ],
                [
                    'name' => 'call-create',
                    'label' => 'ایجاد اسکرین جدید',
                ],
            ],
            'suggest-content' => [
                [
                    'name' => 'content-list',
                    'label' => 'لیست مطالب پیشنهادی',
                ],
                [
                    'name' => 'content-create',
                    'label' => 'ایجاد مطلب پیشنهادی',
                ],
                [
                    'name' => 'content-show',
                    'label' => 'نمایش مطلب پیشنهادی',
                ],
            ],
            'program' => [
                [
                    'name' => 'program-list',
                    'label' => 'مشاهده لیست برنامه ها',
                ],
                [
                    'name' => 'program-create',
                    'label' => 'ایجاد برنامه جدبد',
                ],
                [
                    'name' => 'program-show',
                    'label' => 'مشاهده برنامه',
                ],
                [
                    'name' => 'program-show-student',
                    'label' => 'مشاهده برنامه دانش‌ آموز',
                ],
            ],


        ];

        foreach ($lists as $key => $items) {
            foreach ($items as $item) {
                $permission = Permission::where('name', $item['name'])->first();
                if (!$permission) {
                    Permission::create([
                        'name' => $item['name'],
                    ]);
                } else {
                    $permission->update([
                        'name' => $item['name'],
                    ]);
                }
            }
        }
    }
}
