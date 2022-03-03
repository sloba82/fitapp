<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use App\Helpers\UuidGenerateHelper;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(UuidGenerateHelper $uuidGenerateHelper)
    {
        $facilitesData = [
            ['name' => 'GeekFit'],
            ['name' => 'TotalFit'],

        ];

        foreach ( $facilitesData as  $faciliteData) {
            $facility = Facility::create($faciliteData);
            $facility->uuids()->create([
                'uuid' => $uuidGenerateHelper->generateUuid()
            ]);
        }




    }
}
