<?php
namespace Laraveldaily\Timezones;
  
use App\Http\Controllers\Controller;
use Carbon\Carbon;
  
class TimezonesController extends Controller
{
  
    public function index($timezone = null)
    {
        $currentTime = $timezone ? Carbon::now($timezone)->toDateTimeString() : Carbon::now()->toDateTimeString();
        
        return view('timezones::time', compact('currentTime'));
    }
}
