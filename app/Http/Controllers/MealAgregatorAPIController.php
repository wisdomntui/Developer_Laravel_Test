<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealAgregatorAPIController extends Controller
{
    public function receiveWebHook(Request $request)
    {
        for ($i=0; $i < $request->count ; $i++) { 
            # code...
            (new NotifyAdminAction)->call($request, $i);
        }
    }
}
