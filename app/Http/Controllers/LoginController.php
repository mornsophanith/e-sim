<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function register(Request $request) {
        $email = $request->email;
        $countries = DB::table('countries') ->orderBy('country_code', 'asc') ->get();
        $currentCountry = $this->getCountry($request->ip(), $request->c);
        if ($request->isMethod('post')) {
            $validator = Validator::make(
                [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => $request->password
                ]
                ,
                [
                    'name' => ['required'],
                    'phone' => ['required'],
                    'email' => ['required', 'unique:customers', 'email'],
                    'password' => ['required']
                ]
            );
     
            if ($validator->fails()) {
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');   
            }

            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->password = bcrypt($request->password);
            $customer->status = 'PENDING';
            $customer->save();
            
            return redirect()->intended('waiting-approve');
        }

        return view('pages.register', ['countries' =>  $countries, 'currentCountry' => $currentCountry]);
    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $email = $request->email;
            $validator = Validator::make(['email' => $email, 'password' => $request->password], [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
     
            if (Auth::guard('web:customer')->attempt(['email' => $email, 'password' => $request->password, 'status' => 'ACTIVE'])) {
                $request->session()->regenerate();
     
                return redirect()->intended('account');
            }

            $account = DB::table('customers')->where('email', $email)->first();
            if ($account) {
                if ($account->status == 'PENDING') {
                    $validator->errors()->add('invalid_account', 'Your account is currently inactive. Please contact the administrator to activate your account.');
                } else if ($account->status == 'DEACTIVE') {
                    $validator->errors()->add('invalid_account', 'Sorry, your account has been deactivated by the administrator. Please contact them for further information.');
                }
            } else {
                $validator->errors()->add('invalid_account', 'Invalid credentials, try again');
            }

            return back()->withErrors($validator)->withInput();
        }

        return view('pages.login');
    }

    public function logout(Request $request): RedirectResponse {
        Auth::guard('web:customer')->logout();
    
        // $request->session()->invalidate();
    
        // $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function setPassword() {
        return view ('pages.set-new-password');
    }

    public function forgetPassword() {
        return view ('pages.forget-password');
    }

    public function getProfile() {
        $profile = Auth::guard('web:customer')->user();
        return view('pages.account', ['profile' => $profile]);
    }

    public function updateAccount() {
        return view('pages.form-update-account');
    }
    public function detailHistory() {
        return view('pages.detail-history');
    }
    public function checkMail() {
        return view('pages.check-mail');
    }
    public function waitingApprove() {
        return view('pages.waiting-approve');
    }
    
}
