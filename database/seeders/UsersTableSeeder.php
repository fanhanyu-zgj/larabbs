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
    }
}
