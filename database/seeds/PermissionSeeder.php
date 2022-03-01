<?php

use Illuminate\Database\Seeder;
use \App\Role;
use \App\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manage_user = Role::create(['name' => 'manage_user', 'label' => 'مدیریت کاربران']);
        $manage_permission = Role::create(['name' => 'manage_permission', 'label' => 'مدیریت دسترسی ها']);
        $manage_roles = Role::create(['name' => 'manage_roles', 'label' => 'مدیریت مقام ها']);
        $manage_article = Role::create(['name' => 'manage_article', 'label' => 'مدیریت مقالات']);
        $manage_comment = Role::create(['name' => 'manage_comment', 'label' => 'مدیریت نظرات']);
        $manage_slider = Role::create(['name' => 'manage_slider', 'label' => 'مدیریت اسلایدر']);
        $manage_contact = Role::create(['name' => 'manage_contact', 'label' => 'مدیریت تماس با ما']);
        $manage_discount = Role::create(['name' => 'manage_discount', 'label' => 'مدیریت تخفیفات']);
        $manage_order = Role::create(['name' => 'manage_order', 'label' => 'مدیریت سفارشات']);
        $option = Role::create(['name' => 'option', 'label' => 'تنظیمات ']);
        $vila = Role::create(['name' => 'vila', 'label' => 'مدیریت ویلا ']);
        $manage_gallery = role::create(['name' => 'manage_gallery', 'label' => 'مدیریت گالری']);
        ////////////////////////////////////////////////////////////////////////////////////////

        $show_user = Permission::create(['name' => 'show_user', 'label' => 'مشاهده کاربران']);
        $show_admin = Permission::create(['name' => 'show_admin', 'label' => 'مشاهده مدیران']);
        $create_user = Permission::create(['name' => 'create_user', 'label' => 'ایجاد کاربر']);
        $update_user = Permission::create(['name' => 'update_user', 'label' => 'ویرایش کاربر']);
        $delete_user = Permission::create(['name' => 'delete_user', 'label' => 'حذف کاربر']);
        $permission_user = Permission::create(['name' => 'permission_user', 'label' => 'اعمال دسترسی کاربران']);

        $manage_user->permissions()->sync([$show_admin->id, $create_user->id, $update_user->id, $delete_user->id, $permission_user->id, $show_user->id]);

        $show_permission = Permission::create(['name' => 'show_permission', 'label' => 'مشاهده دسترسی']);
        $create_permission = Permission::create(['name' => 'create_permission', 'label' => 'ایجاد دسترسی']);
        $update_permission = Permission::create(['name' => 'update_permission', 'label' => 'ویرایش دسترسی']);
        $delete_permission = Permission::create(['name' => 'delete_permission', 'label' => 'حذف دسترسی']);

        $manage_permission->permissions()->sync([$create_permission->id, $update_permission->id, $delete_permission->id, $show_permission->id]);

        $show_role = Permission::create(['name' => 'show_role', 'label' => 'مشاهده مقام']);
        $create_role = Permission::create(['name' => 'create_role', 'label' => 'ایجاد مقام']);
        $update_role = Permission::create(['name' => 'update_role', 'label' => 'ویرایش مقام']);
        $delete_role = Permission::create(['name' => 'delete_role', 'label' => 'حذف مقام']);

        $manage_roles->permissions()->sync([$show_role->id, $create_role->id, $update_role->id, $delete_role->id]);


        $show_article = Permission::create(['name' => 'show_article', 'label' => 'مشاهده مقاله']);
        $create_article = Permission::create(['name' => 'create_article', 'label' => 'ایجاد مقاله']);
        $update_article = Permission::create(['name' => 'update_article', 'label' => 'ویرایش مقاله']);
        $delete_article = Permission::create(['name' => 'delete_article', 'label' => 'حذف مقاله']);
        $show_categroy_article = Permission::create(['name' => 'show_categroy_article', 'label' => 'مشاهده دسته بندی مقاله']);
        $create_categroy_article = Permission::create(['name' => 'create_categroy_article', 'label' => 'ایجاد دسته بندی مقاله']);
        $update_categroy_article = Permission::create(['name' => 'update_categroy_article', 'label' => 'ویرایش دسته بندی مقاله']);
        $delete_categroy_article = Permission::create(['name' => 'delete_categroy_article', 'label' => 'حذف دسته بندی مقاله']);

        $manage_article->permissions()->sync([$show_article->id, $create_article->id, $update_article->id, $delete_article->id,
            $show_categroy_article->id, $create_categroy_article->id, $update_categroy_article->id, $delete_categroy_article->id]);


        $show_comment = Permission::create(['name' => 'show_comment', 'label' => 'مشاهده نظرات']);
        $update_comment = Permission::create(['name' => 'update_comment', 'label' => 'پاسخگویی به نظرات ']);
        $delete_comment = Permission::create(['name' => 'delete_comment', 'label' => 'حذف نظرات ']);

        $manage_comment->permissions()->sync([$show_comment->id, $update_comment->id, $delete_comment->id]);


        $show_slider = Permission::create(['name' => 'show_slider', 'label' => 'مشاهده اسلایدر']);
        $create_slider = Permission::create(['name' => 'create_slider', 'label' => 'ایجاد اسلایدر']);
        $update_slider = Permission::create(['name' => 'update_slider', 'label' => 'ویرایش اسلایدر']);
        $delete_slider = Permission::create(['name' => 'delete_slider', 'label' => 'حذف اسلایدر']);

        $manage_slider->permissions()->sync([$show_slider->id, $create_slider->id, $update_slider->id, $delete_slider->id]);


        $show_contact = Permission::create(['name' => 'show_contact', 'label' => 'مشاهده تماس با ما']);
        $seen_contact = Permission::create(['name' => 'update_contact', 'label' => 'تایید دیده خوانده شده تماس با ما ']);
        $delete_contact = Permission::create(['name' => 'delete_contact', 'label' => 'حذف تماس با ما ']);
        $send_email = Permission::create(['name' => 'send_sms', 'label' => ' ارسال پیام']);

        $manage_contact->permissions()->sync([$show_contact->id, $seen_contact->id, $delete_contact->id, $send_email->id]);

        $show_discount = Permission::create(['name' => 'show_discount', 'label' => 'مشاهده تخفیف']);
        $create_discount = Permission::create(['name' => 'create_discount', 'label' => 'ایجاد تخفیف']);
        $update_discount = Permission::create(['name' => 'update_discount', 'label' => 'ویرایش تخفیف']);
        $delete_discount = Permission::create(['name' => 'delete_discount', 'label' => 'حذف تخفیف']);

        $manage_discount->permissions()->sync([$show_discount->id, $create_discount->id, $update_discount->id, $delete_discount->id]);

        $show_order = Permission::create(['name' => 'show_order', 'label' => 'مشاهده سفارشات']);
        $unpaid = Permission::create(['name' => 'unpaid', 'label' => 'مشاهده سفارشات پرداخت نشده']);
        $paid = Permission::create(['name' => 'paid', 'label' => 'مشاهده سفارشات پرداخت شده']);
        $prepartion = Permission::create(['name' => 'prepartion', 'label' => 'مشاهده سفارشات در حال پردازش ']);
        $end = Permission::create(['name' => 'end', 'label' => 'مشاهده سفارشات  تمام شده ']);
        $cancel = Permission::create(['name' => 'cancel', 'label' => 'مشاهده سفارشات   کنسلی ']);
        $delete_order = Permission::create(['name' => 'delete_order', 'label' => 'حذف سفارش ']);
        $cancel_order = Permission::create(['name' => 'cancel_order', 'label' => 'توانایی کنسل کردن سفارش ']);

        $manage_order->permissions()->sync([$show_order->id, $unpaid->id, $paid->id, $prepartion->id,  $end->id, $cancel->id,  $delete_order->id, $cancel_order->id]);


        $show_option = Permission::create(['name' => 'show_option', 'label' => ' مشاهده تنظیمات']);

        $option->permissions()->sync([$show_option->id]);

        $show_vila = Permission::create(['name' => 'show_vila', 'label' => ' مشاهده ویلا']);
        $update_vila = Permission::create(['name' => 'update_vila', 'label' => ' ویرایش ویلا']);

        $vila->permissions()->sync([$show_vila->id , $update_vila->id]);


        $show_gallery = permission::create(['name' => 'show_gallery', 'label' => 'مشاهده گالری']);
        $create_gallery = permission::create(['name' => 'create_gallery', 'label' => 'ایجاد گالری']);
        $update_gallery = permission::create(['name' => 'update_gallery', 'label' => 'ویرایش گالری']);
        $delete_gallery = permission::create(['name' => 'delete_gallery', 'label' => 'حذف گالری']);

        $manage_gallery->permissions()->sync([$show_gallery->id, $create_gallery->id, $update_gallery->id, $delete_gallery->id]);
    }
}
