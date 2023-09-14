<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Country;
use App\Customer;
use App\Plan;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function billingDetail(Request $request) {
        $cart = session('cart');
        $cart = (object) json_decode($cart, true);
        $profile = Auth::guard('web:customer')->check() ? Auth::guard('web:customer')->user() : new Customer();
        
        if ($request->isMethod('post')) {
            DB::transaction(function () use($request, $cart) {
                $order_id = DB::table('orders')->insertGetId([
                    'customerName' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country_id' => $request->countryId,
                    'state' => $request->state,
                    'date' => Carbon::now(),
                    'discount' => $cart->discount,
                    'total' => $cart->total,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                
                foreach($cart->order_entries as $plan) {
                    $order_entry = [
                        'order_id' => $order_id,
                        'plan_id' => $plan['planId'],
                        'plan_name' => $plan['name'],
                        'quantity' => $plan['quantity'],
                        'price' => $plan['price'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                    $order_entry_id = DB::table('order_entries')->insertGetId($order_entry);
                    
                    if (isset($plan['order_details'])) {
                        $order_details = [];
                        foreach ($plan['order_details'] as $order_detail) {
                            $order_detail = [
                                'order_entry_id' => $order_entry_id,
                                'name' => $order_detail['name'],
                                'passport_no' => $order_detail['passport_no'],
                                'visa_no' => $order_detail['visa_no'],
                                'air_ticket_no' => $order_detail['air_ticket_no'],
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ];

                            array_push($order_details, $order_detail);
                        }

                        DB::table('order_details')->insert($order_details);
                    }

                    if (isset($plan['order_detail'])) {
                        $order_detail = $plan['order_detail'];
                        DB::table('order_details')->insert([
                            'order_entry_id' => $order_entry_id,
                            'name' => $order_detail['name'],
                            'passport_no' => $order_detail['passport_no'],
                            'visa_no' => $order_detail['visa_no'],
                            'air_ticket_no' => $order_detail['air_ticket_no'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }

                session()->forget('cart');

                return redirect('billing-detail')->with('status', 'Your order has been placed successfully!');
            });
        }

        $countries = Country::get();
        return view('pages.billing-detail', ['profile' => $profile, 'cart' => $cart, 'countries' => $countries]);
    }

    public function checkout(Request $request) {
        if ($request->isMethod('post')) {
            $order = $request->order;
            foreach($order['order_entries'] as $key => $order_entry) {
                $order['order_entries'][$key]['quantity'] = (int) $order_entry['quantity'];
                $order['order_entries'][$key]['price'] = (int) $order_entry['price'];
            }
            
            session(['cart' => json_encode($order, true)]);
            return redirect()->route('billing-detail');
        }

        $cart = session('cart');
        $is_partner = Auth::guard('web:customer')->check();

        $country = $this->getCountry($request->ip(), $request->c);
        $order = new Order();;
     
        $order_entries = [];
        if ($cart) {
            $cart = (object) json_decode($cart, true);
            $order->discount = $cart->discount;
            $order->total = $cart->total;
            foreach($cart->order_entries as $key => $order_entry) {

                if ($country->required_esim_owner) {
                    $order_details = [];
                    $order_detail = [
                        'unique_id' => null, 
                        'name' => '', 
                        'passport_no' => '', 
                        'visa_no' => '', 
                        'air_ticket_no' => ''
                    ];
                    
                    if (isset($order_entry['order_details'])) {
                        //TODO: implement logic to keep user data in form
                        for($i = 0; $i < $order_entry['quantity']; $i++) {
                            $order_detail['unique_id'] = Str::uuid();
                            array_push($order_details,  $order_detail);
                        }
                    } else {
                        for($i = 0; $i < $order_entry['quantity']; $i++) {
                            $order_detail['unique_id'] = Str::uuid();
                            array_push($order_details,  $order_detail);
                        }
                    }

                    $order_entry['order_details'] = $order_details;

                } else if ($is_partner) {
                    $order_detail = [
                        'name' => '',
                        'passport_no' => '',
                        'visa_no' => '',
                        'air_ticket_no' => ''
                    ];
                    $order_entry['order_detail'] = $order_detail;
                }
                
                array_push($order_entries, $order_entry);
            }

            $order['order_entries'] = $order_entries;

            session(['cart' => json_encode($order, true)]);
        }
        
        return view('pages.checkout', [
            'order' => $order,
        ]);
    }

    public function getCart() {
        return session('cart');
    } 

    public function addToCart(Request $request) {
        $cart = session('cart');
        $plan = Plan::find($request->planId);
        $request->quantity = (int) $request->quantity;
        
        if ($cart) {
            $cart = (object) json_decode($cart, true);
            $cart->total = 0;
            $order_entries = $cart->order_entries;
            $isNotFoundPlan = true;
            
            foreach($order_entries as $key => $value) {
                $value = (object) $value;
                if ($value->planId == $request->planId) {
                    $order_entries[$key]['quantity'] += $request->quantity;
                    $isNotFoundPlan = false;
                }

                $cart->total += ($order_entries[$key]['quantity'] * $order_entries[$key]['price']);
            }

            if ($isNotFoundPlan) {
                $cart->total += ($plan->price * $request->quantity);
                
                array_push($order_entries, ['planId' => $request->planId, 'name' => $plan->name, 'image' => $plan->image, 'price' => $plan->price, 'quantity' => (int) $request->quantity]);
            }

            $cart->order_entries = $order_entries;
        } else {
            $cart = new Cart();
            $cart->total = $plan->price * (int) $request->quantity;
            $cart->discount = 0;
            $cart->order_entries = [['planId' => $request->planId, 'name' => $plan->name, 'image' => $plan->image, 'price' => $plan->price, 'quantity' => (int) $request->quantity]];
        }
        
        session(['cart' => json_encode($cart, true)]);

        return json_encode($cart, true);
    }
    

    public function updateCart(Request $request) {
        $cart = session('cart');
        $cart = (object) json_decode($cart);
        $order_entries = $cart->order_entries;
        $cart->total = 0;

        foreach($order_entries as $key => $plan) {
            $plan = (object) $plan;
            if ($plan->planId == $request->planId) {
                if ($request->quantity) {
                    $order_entries[$key]->quantity = $request->quantity;
                    $cart->total += $order_entries[$key]->quantity * $plan->price;
                } else {
                    unset($order_entries[$key]);
                }
            } else {
                $cart->total += $plan->quantity * $plan->price;
            }
        }
        $cart->order_entries = $order_entries;
        
        session(['cart' => json_encode($cart, true)]);

        return $cart;
    }

    public function removeCart(Request $request) {
        $cart = session('cart');
        $cart = (object) json_decode($cart, true);
        $order_entries = $cart->order_entries;
        $cart->total = 0;

        foreach($order_entries as $key => $plan) {
            $plan = (object) $plan;
            if ($plan->planId == $request->planId) {
                unset($order_entries[$key]);
            } else {
                $cart->total += $plan->quantity * $plan->price;
            }
        }

        $cart->order_entries = $order_entries;
        if (count($order_entries) == 0 ) {
            session(['cart' => null]);
        } else {
            session(['cart' => json_encode($cart, true)]);
        }

       

        return $cart;
    }

    public function removeOrderDetail(Request $request) {
        $plan_id = $request->planId;
        $unique_id = $request->unique_id;

        $cart = session('cart');
        $cart = (object) json_decode($cart, true);
        $order_entries = $cart->order_entries;
        $cart->total = 0;

        $order_entry_index = array_search($plan_id, array_column($order_entries, 'planId'));
        if ($order_entry_index !== false) {
            $order_details = $order_entries[$order_entry_index]['order_details'];
            $detail_index = array_search($unique_id, array_column($order_details, 'unique_id'));
            if ($detail_index !== false) {
                unset($order_details[$detail_index]);
                $order_entries[$order_entry_index]['quantity']--;
                $order_entries[$order_entry_index]['order_details'] = $order_details;

                if ($order_entries[$order_entry_index]['quantity'] <= 0) {
                    unset($order_entries[$order_entry_index]);
                }
            }
        }

        foreach($order_entries as $order_entry) {
            $cart->total += $order_entry['quantity'] * $order_entry['price'];
        }
        
        $cart->order_entries = $order_entries;

        if (count($order_entries) > 0) {
            session(['cart' => json_encode($cart, true)]);
        } else {
            session()->forget('cart');
        }

        return $cart;
    }
}
