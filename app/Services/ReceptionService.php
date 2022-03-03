<?php

namespace App\Services;

use App\Models\Uuid;
use App\Models\Enter;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ReceptionRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReceptionService
{

    /**
     * Create new entry if meets the condition
     *
     * @param  App\Http\Requests\ReceptionRequest $request
     * @return array
     */
    public function reception(ReceptionRequest $request)
    {
        $request = $request->validated();
        $uuids = Uuid::whereIn('uuid', [$request['object_uuid'], $request['card_uuid']])->with('model')->get();
        $facility = $uuids->where('model_type', 'App\Models\Facility')->first();
        $user =  $uuids->where('model_type', 'App\Models\User')->first();

        $response = [];

        DB::beginTransaction();
        try {

            if($facility && $user && $this->checkDailyEntrance($user->model->id)){
                Enter::create([
                    'user_id' => $user->model->id,
                    'facility_id' => $facility->model->id,
                ]);

                $response = [
                    'object_name' => $facility->model->name,
                    'first_name' => $user->model->name,
                    'last_name' => $user->model->last_name
                ];
            }

            DB::commit();

        } catch (\Exception $exception) {
            Log::error('Error while creating reception ' . $exception);
            DB::rollBack();
            $response = [];
        }

        return $response;

    }

     /**
     * Check if enter is made for current day
     *
     * @param  string
     * @return bool
     */
    private function checkDailyEntrance($userId)
    {
        $dateToday = Carbon::now()->format('Y-m-d');
        if(Enter::where('user_id', $userId )->where('created_at', 'like', $dateToday .'%')->exists()){
            return false;
        }
        return true;
    }

}
