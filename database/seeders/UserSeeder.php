<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Helpers\UuidGenerateHelper;
use PDO;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(UuidGenerateHelper $uuidGenerateHelper)
    {

        $usersData = [
            [
                'name' => 'John',
                'last_name' => 'Doe'
            ],
            [
                'name' => 'Pera',
                'last_name' => 'Peric'
            ]
        ];

        foreach($usersData as $userData){

            $uuids = [
                [
                    'uuid' => $uuidGenerateHelper->generateUuid()
                ],
                [
                    'uuid' => $uuidGenerateHelper->generateUuid()
                ]
            ];

            $user = User::create($userData);
            $user->uuids()->createMany($uuids);
        }

    }
}
