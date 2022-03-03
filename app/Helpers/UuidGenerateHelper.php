<?php
namespace App\Helpers;

use App\Models\Uuid;
use Illuminate\Support\Str;

class UuidGenerateHelper {

   /**
     * Generates uuid string
     *
     * @return string
     */
    public function generateUuid()
    {
        $uuid = Str::uuid();

        if(Uuid::where('uuid', $uuid )->exists()) {
            $this->generateUuid();
        }

        return $uuid;
    }

}
