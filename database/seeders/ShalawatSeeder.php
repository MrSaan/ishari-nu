<?php

namespace Database\Seeders;

use App\Models\Shalawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShalawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/muhud.json";

        $json = json_decode(file_get_contents($path), true);
        foreach ($json['data']['Ibtida']['muhud'] as $data) {
            Shalawat::create([
                'muhud_id' => 1,
                'audio_id' => 1,
                'numberOfMaulidSyarafulAnam' => $data['number']['inMuhud'],
                'text_shalawat' => $data['text']['arab'],
                'transliteration' => $data['text']['transliteration'],
                'translation_id' => $data['translation']['id'],
            ]);
        }
    }
}
