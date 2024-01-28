<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'is_admin' => true,
        ]);

        Brand::create(['name' => 'Toyota']);
        Brand::create(['name' => 'Honda']);
        Brand::create(['name' => 'Suzuki']);
        Brand::create(['name' => 'Mitsubishi']);
        Brand::create(['name' => 'Daihatsu']);
        Brand::create(['name' => 'Nissan']);
        Brand::create(['name' => 'Mazda']);
        Brand::create(['name' => 'Isuzu']);
        Brand::create(['name' => 'Mercedes-Benz']);
        Brand::create(['name' => 'BMW']);
        Brand::create(['name' => 'Lainnya']);

        Car::create([
            'brand_id' => 1,
            'name' => 'Avanza',
            'year' => 2019,
            'price' => 200000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 1,
            'name' => 'Innova',
            'year' => 2019,
            'price' => 300000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 1,
            'name' => 'Fortuner',
            'year' => 2019,
            'price' => 400000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 2,
            'name' => 'Brio',
            'year' => 2019,
            'price' => 200000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 2,
            'name' => 'Jazz',
            'year' => 2019,
            'price' => 300000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 2,
            'name' => 'Mobilio',
            'year' => 2019,
            'price' => 400000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 3,
            'name' => 'Ertiga',
            'year' => 2019,
            'price' => 200000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 3,
            'name' => 'Baleno',
            'year' => 2019,
            'price' => 300000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 3,
            'name' => 'Ignis',
            'year' => 2019,
            'price' => 400000,
            'status' => 'available',
        ]);
        Car::create([
            'brand_id' => 4,
            'name' => 'Xpander',
            'year' => 2019,
            'price' => 200000,
            'status' => 'available',
        ]);
    }
}
