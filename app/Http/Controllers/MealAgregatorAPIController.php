<?php

namespace App\Http\Controllers;

use App\Jobs\MessageJob;
use Illuminate\Http\Request;

class MealAgregatorAPIController extends Controller
{
    public function receiveWebHook(Request $request)
    {
        // Dispatch MessageJob to send messages every minute
        MessageJob::dispatch(['request' => $request, 'index' => 0])->delay(now()->addMinutes(1));
    }
}
