<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = now();
        $data = [];
        for($i=0;$i<=25; $i++){
            $data[]=[
                'date'=>$now,
                'category_id'=>1,
                'amount' => rand(50,5000),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('expenses')->insert($data);
    }
}
