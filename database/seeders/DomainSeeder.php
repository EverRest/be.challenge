<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{
    private const DB_NAME = 'domains';
    private const DOMAINS = [
        'memory', 'reasoning', 'speed', 'attention'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        foreach (self::DOMAINS as $domain) {
            DB::table(self::DB_NAME)->insert([
                'name' => strtolower($domain),
                'created_at' => $date->format('Y-m-d H:i:s'),
                'updated_at' => $date->format('Y-m-d H:i:s')
            ]);
        }
    }
}
