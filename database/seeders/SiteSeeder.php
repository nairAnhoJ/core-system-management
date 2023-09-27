<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SiteSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $site = new Site();
        $site->name = strtoupper('Parañaque (Head Office)');
        $site->key = Str::uuid()->toString();
        $site->save();
    }
}
