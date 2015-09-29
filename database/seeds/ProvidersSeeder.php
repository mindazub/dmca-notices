<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
				'name' => 'Youtube',
				'copyright_email' => 'copyright@youtube.com'
			]);
        Provider::create([
				'name' => 'Yahoo',
				'copyright_email' => 'copyright@yahoo.com'
			]);
    }
}



