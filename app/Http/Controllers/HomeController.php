<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Country;

class HomeController extends Controller
{
    public function index(Request $request) {
        $support_devices = DB::table('support_devices')->get();
        $questions = DB::table('questions')->get();
        $how_it_works = DB::table('how_it_works')->get();
        $whatEsims = DB::table('what_esims')->get();
        $country = $this->getCountry($request->ip(), $request->c);
        $countries = DB::table('countries')->where('id', '!=', $country->id)->get();
        $banners = DB::table('banners')->where('country_id', '=', $country->id)->get();
        $plans = DB::table('plans')->where('country_id', '=', $country->id)->get();
        return view('index', [
            'countries' => $countries,
            'support_devices' => $support_devices,
            'questions' => $questions,
            'country' => $country,
            'banners' => $banners,
            'plans' => $plans,
            'whatEsims' => $whatEsims,
            'how_it_works' => $how_it_works
           
        ]);
     }
 
}
