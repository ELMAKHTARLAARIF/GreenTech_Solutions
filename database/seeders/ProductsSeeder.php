<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
use App\Models\Client;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Use real client IDs
        // $clients = Client::all();

        // Produit::factory()->count(50)->make()->each(function ($produit) use ($clients) {
        //     $produit->client_id = $clients->random()->id;
        //     $produit->save();
        // });
    }
}
