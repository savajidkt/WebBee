<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;

class EventsController extends BaseController
{
    public function getEventsWithWorkshops() {
       // throw new \Exception('implement in coding task 1');
    		$events = DB::table('events')->get();

    		return response()->json(['events' =>$events]);

    }

    public function getFutureEventsWithWorkshops() {
        throw new \Exception('implement in coding task 2');
    }
}
