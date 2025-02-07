<?php

namespace Database\Seeders;

use App\Models\Link;
use Database\Factories\LinkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::factory()->times(6)->create();
    }
}
