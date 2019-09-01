<?php

use Illuminate\Database\Seeder;
use LaravelForum\channel;

class channelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel = channel::create([
            'name' => 'laravel',
            'slug' => str_slug('laravel disscuss')
        ]);

        $channel = channel::create([
            'name' => 'Vue',
            'slug' => str_slug('Vue disscuss')
        ]);

        $channel = channel::create([
            'name' => 'React',
            'slug' => str_slug('React disscuss')
        ]);

        $channel = channel::create([
            'name' => 'Nodejs',
            'slug' => str_slug('Nodejs disscuss')
        ]);
    }
}
