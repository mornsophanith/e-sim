<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Country;
use App\GuzzleHttp\Helper;
use GuzzleHttp\Psr7;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct() {
        $this->api = Helper::getInstance()->getClient();
    }

    function getCountry($clientIP = '96.9.80.54', $countryId) {
        $clientIP = $clientIP == '127.0.0.1' || '::1' ? '96.9.80.54' : $clientIP;
        $country = new Country();
        if ($countryId) {
            $country = Country::where('id', $countryId)->first();
        } else {
            try {
                $response = $this->api->request(
                    'GET',
                    "https://ipinfo.io/$clientIP/country"
                );
        
                if ($response->getStatusCode() == 200) {
                    $response = $response->getBody();
                    $countryCode = preg_replace('/\n/', '', $response->getContents());
                    $country = Country::where('code', $countryCode)->first();
                }
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        

        return $country;
    }
}
