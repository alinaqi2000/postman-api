<?php

namespace App\Http\Controllers;


class BaseController extends Controller
{

    /**
     * Converts the data into json response 
     * @param boolean $status
     * @param array $data
     * @param integer $code
     * @return mixed
     */
    public function returnResponse($status, $data, $code)
    {
        return response()->json(["status" => $status, "data" => $data], $code);
    }

}