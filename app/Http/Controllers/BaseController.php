<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BaseController extends Controller
{   
    public function sendResponse($data, $code)
    {
        return response()->json($data, $code);
    }

}
