<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\GuzzleHttp\Helper;
use App\Country;

class HeaderMobile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->api = Helper::getInstance()->getClient();
    }

    public function getCountry($clientIP = '96.9.80.54') {
        $clientIP = $clientIP == '127.0.0.1' || '::1' ? '96.9.80.54' : $clientIP;
        $country = new Country();
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

        return $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $plans = DB::table('plans')->get();
        $country = $this->getCountry(request()->ip());
        $baseUrl = ENV('APP_URL');

        return view('components.header-mobile', ['country' => $country, 'plans' => $plans, 'baseUrl' => $baseUrl,]);
    }
}
