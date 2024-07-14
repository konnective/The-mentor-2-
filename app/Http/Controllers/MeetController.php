<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google_Client;
use Illuminate\Http\Request;
use App\Services\GoogleService;
use Google_Service_Calendar;
use Spatie\GoogleCalendar\Event;

class MeetController extends Controller
{
    //


    protected $client;



    public function test()
    {


        return view('admin.test');
    }
}
