<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Metodo do Eloquent
//        Client::insert([
//            'name' => str_random(10),
//            'email' => str_random(11). "@" .str_random(7).".".str_random(3),
//            'age' => rand(0,100),
//            'photo' => "./".str_random(100),
//            'user_id' => 1
//        ]);
        factory(Client::class, 3)->create();
    }
}
