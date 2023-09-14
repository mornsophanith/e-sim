<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;

class ProductController extends Controller
{
    public function detailProduct(Request $request) {
        $id = request()->id;
        $country = $this->getCountry($request->ip(), $request->c);
        $questions = DB::table('questions')->get();
        $realTimeSolutions = DB::table('real_time_solutions')->where('country_id', '=', $country->id)->get();
        $relatedPlans = DB::table('plans')->where('id', '<>', 'id')->limit(3)->get();
        $planDetail = DB::table('plans')->where('id', $id)->first();

        return view('pages.detail-product', [
            'questions' => $questions,
            'relatedPlans' => $relatedPlans,
            'planDetail' => $planDetail,
            'realTimeSolutions' => $realTimeSolutions,
        ]);
    }
}
