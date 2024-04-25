<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo vai trò
        $admin = Role::create(['guard_name' => 'admin','name' => 'Admin']);

        // Gán vai trò
        User::find(1)->assignRole('Admin');

        $view_tournament = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách giải đấu']);
        $create_tournament = Permission::create(['guard_name' => 'admin','name' => 'Thêm giải đấu']);
        $edit_tournament = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa giải đấu']);
        $draw_tournament = Permission::create(['guard_name' => 'admin','name' => 'Chia bảng giải đấu']);
        $delete_tournament = Permission::create(['guard_name' => 'admin','name' => 'Xóa giải đấu']);

        $admin->givePermissionTo($view_tournament);
        $admin->givePermissionTo($create_tournament);
        $admin->givePermissionTo($edit_tournament);
        $admin->givePermissionTo($draw_tournament);
        $admin->givePermissionTo($delete_tournament);

        $view_match = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách trận đấu']);
        $create_match = Permission::create(['guard_name' => 'admin','name' => 'Thêm trận đấu']);
        $edit_match = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa trận đấu']);
        $delete_match = Permission::create(['guard_name' => 'admin','name' => 'Xóa trận đấu']);

        $admin->givePermissionTo($view_match);
        $admin->givePermissionTo($create_match);
        $admin->givePermissionTo($edit_match);
        $admin->givePermissionTo($delete_match);

        $view_user = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách tài khoản']);
        $create_user = Permission::create(['guard_name' => 'admin','name' => 'Thêm tài khoản']);
        $edit_user = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa tài khoản']);
        $delete_user = Permission::create(['guard_name' => 'admin','name' => 'Xóa tài khoản']);

        $admin->givePermissionTo($view_user);
        $admin->givePermissionTo($create_user);
        $admin->givePermissionTo($edit_user);
        $admin->givePermissionTo($delete_user);

        $view_role = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách vai trò']);
        $create_role = Permission::create(['guard_name' => 'admin','name' => 'Thêm vai trò']);
        $edit_role = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa vai trò']);
        $delete_role = Permission::create(['guard_name' => 'admin','name' => 'Xóa vai trò']);

        $admin->givePermissionTo($view_role);
        $admin->givePermissionTo($create_role);
        $admin->givePermissionTo($edit_role);
        $admin->givePermissionTo($delete_role);

        $view_permission = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách quyền']);
        $view_permission_detail = Permission::create(['guard_name' => 'admin','name' => 'Xem quyền']);
        $edit_permission = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa quyền']);

        $admin->givePermissionTo($view_permission);
        $admin->givePermissionTo($view_permission_detail);
        $admin->givePermissionTo($edit_permission);

        $view_teamm = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách đội bóng']);
        $create_teamm = Permission::create(['guard_name' => 'admin','name' => 'Thêm đội bóng']);
        $edit_teamm = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa đội bóng']);
        $delete_teamm = Permission::create(['guard_name' => 'admin','name' => 'Xóa đội bóng']);

        $admin->givePermissionTo($view_teamm);
        $admin->givePermissionTo($create_teamm);
        $admin->givePermissionTo($edit_teamm);
        $admin->givePermissionTo($delete_teamm);
    }
}
