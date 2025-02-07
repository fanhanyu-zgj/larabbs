<?php

use App\Models\Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 需清除缓存，否则会报错
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // 先创建权限
        Permission::create(['name'=>'manage_contents']);
        Permission::create(['name'=>'manage_users']);
        Permission::create(['name'=>'edit_settings']);

        // 创建站长角色，并赋予权限
        $founder=Role::create(['name'=>'Founder']);
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');

        // 创建管理员角色，并赋予权限
        $maintainer=Role::create(['name'=>'Maintainer']);
        $maintainer->givePermissionTo('manage_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         // 需清除缓存，否则会报错
         app(PermissionRegistrar::class)->forgetCachedPermissions();

         // 清空所有数据表
         $tabelNames=config('permission.table_names');

         EloquentModel::unguard();
         DB::table($tabelNames['role_has_permissions'])->delete();
         DB::table($tabelNames['model_has_roles'])->delete();
         DB::table($tabelNames['model_has_permissions'])->delete();
         DB::table($tabelNames['roles'])->delete();
         DB::table($tabelNames['permissions'])->delete();
    }
};
