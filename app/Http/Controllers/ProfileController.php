<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create(ProfileCreateRequest $request)
    {
        $call = (new CreateProfileAction) -> call($request);
        if($call){
            return response()->json([], 200);
        }
        return response([], 500);
    }
}
