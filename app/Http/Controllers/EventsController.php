<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EventsController extends BaseController
{
    public function getEventsWithWorkshops() {
       // throw new \Exception('implement in coding task 1');
    	$events = DB::table('events')
            ->leftJoin('workshops', 'workshops.event_id', '=', 'events.id')
            ->get();

    		return response()->json($events);

    }

    public function getFutureEventsWithWorkshops() {

    	$events = DB::table('events')
            ->leftJoin('workshops', 'workshops.event_id', '=', 'events.id')->whereDate('start', '>',date('Y-m-d H:i:s'))
            ->get();

    		return response()->json($events);

    	
        //throw new \Exception('implement in coding task 2');
    }
}
