<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成数据合集
        User::factory()->count(10)->create();

        // 单独处理第一个用户的数据
        $user=User::find(1);
        $user->name='yftx';
        $user->email='wdsj002@126.com';
        $user->save();
        // 初始化用户角色，将 1 号 用户指派为【站长】
        $user->assignRole('Founder');

        // 将 2 号用户指派为【管理员】
        $user=User::find(2);
        $user->assignRole('Maintainer');
    }
}
