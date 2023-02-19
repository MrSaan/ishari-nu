<?php

namespace Database\Seeders;

use App\Models\Muhud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuhudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/judul.json";

        $json = json_decode(file_get_contents($path), true);
        foreach ($json['data'] as $data) {
            Muhud::create([
                'name_short' => $data['name']['short'],
                'name_long' => $data['name']['long'],
                'numberOfShalawat' => $data['numberOfVerses'],
                'transliteration_arab' => $data['name']['transliteration']['arab'],
                'transliteration_id' => $data['name']['transliteration']['id'],
                'translation_id' => $data['name']['translation']['id'],
            ]);
        }
    }
}
