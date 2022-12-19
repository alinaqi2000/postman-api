<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculationController extends BaseController
{
    public function index(Request $request)
    {

        return $this->returnResponse(true, [], 200);

    }
    public function calculate_mean(Request $request)
    {

        $validateUser = Validator::make(
            $request->all(),
            [
                'inps' => "required|array",
                'inps.*' => "numeric"
            ],
            [
                'inps.required' => "Please add a valid input.",
                'inps.array' => "Input must be in array formart."
            ]
        );

        if ($validateUser->fails()) {
            return $this->returnResponse(false, ['messages' => $validateUser->errors()], 401);
        }
        $numbers = $request->get("inps");

        $mean = array_sum($numbers) / count($numbers);

        return $this->returnResponse(true, ['result' => $mean], 200);

    }
}