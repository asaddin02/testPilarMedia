<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create data User dengan role Admin
        User::create([
            'name' => 'prasada',
            'email' => 'prasada@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'Admin'
        ]);

        // Create data order menggunakan API
        $url = 'http://localhost:8000/api/setapi';
        $client = new Client();

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        foreach ($data as $item) {
            Order::create([
                'id_pengirim' => $item['id_pengirim'],
                'id_penerima' => $item['id_penerima'],
                'alamat' => $item['alamat'],
                'priority' => $item['priority']
            ]);
        }
    }
}
