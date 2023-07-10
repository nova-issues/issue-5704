<?php

namespace Database\Seeders;

use App\Models\Meta;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meta::create([
            'name' => 'visible',
            'type' => 'bool'
        ]);
        Meta::create([
            'name' => 'color',
            'type' => 'enum',
            'values' => [
                'red',
                'green',
                'blue'
            ]
        ]);
        Meta::create([
            'name' => 'author',
            'type' => 'string'
        ]);
        Meta::create([
            'name' => 'tags',
            'type' => 'multi',
            'values' => [
                'adventure',
                'action',
                'comedy',
                'fantasy',
            ]
        ]);
    }
}
