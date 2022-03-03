<?php

namespace App\Http\Controllers;

use App\Services\ReceptionService;
use App\Http\Requests\ReceptionRequest;
use Illuminate\Support\Facades\Log;

class ReceptionController extends Controller
{

    /**
     * @param  App\Http\Requests\ReceptionRequest $request
     * @param  App\Services\ReceptionService $receptionService
     * @return json
     */

    public function __invoke(ReceptionRequest $request, ReceptionService $receptionService)
    {
        try {

            $response = $receptionService->reception($request);

            return response()->json($response, 200);
        } catch (\Exception $exception) {
            Log::error('Error on reception ' . $exception);
        }

        return response()->json(['message' => 'Something went wrong'], 500);
    }
}
