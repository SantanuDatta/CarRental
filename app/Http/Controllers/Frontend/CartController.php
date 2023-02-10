<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Car;
use App\Models\Extra;
use App\Models\Protection;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::user()->id)->where('car_id', $request->car_id)->where('order_id', Null)->first();
        }else{
            $cart = Cart::where('ip_address', request()->ip())->where('car_id', $request->car_id)->where('order_id', Null)->first();
        }
        $cart = new Cart();
        // $reservation_exists = Cart::where('car_id', $request->car_id)
        // ->whereBetween('pick_date',[$request->pick_time, $request->return_time])
        // ->orWhereBetween('return_date',[$request->pick_time, $request->return_time])
        // ->orWhere(fn($query) => $query->where('pick_date','<=',$request->return_date)
        // ->where('return_date','>=',$request->pick_date)
        // )->first();
        $reservation_exists = Cart::where('car_id', $request['car_id'])
        ->where('pick_date', '<=', new DateTime($request['pick_date']))
        ->where('return_date', '>=', new DateTime($request['return_date']))
        ->exists();
        if($reservation_exists){
            $notification = array(
                'alert-type'    => 'warning',
                'message'       => 'Car Is Already Reserved At This Date!',
            );
            return redirect()->back()->with($notification);
        }else{
            if(Auth::check()){
                $cart->user_id          = Auth::user()->id;
            }
            $cart->ip_address           = request()->ip();
            $cart->car_id               = $request->car_id;
            $cart->order_id             = $request->order_id;
            $cart->car_quantity         = 1;
            $cart->pick_up              = $request->pick_up;
            $cart->drop_off             = $request->drop_off;
            $datePicked                 = new DateTime($request->pick_date);
            $cart->pick_date            = $datePicked;

            $cart->pick_time            = $request->pick_time;
            $dateReturned               = new DateTime($request->return_date);
            $cart->return_date          = $dateReturned;
            $cart->return_time          = $request->return_time;
            $cart->additional_driver    = $request->additional_driver;
            $cart->gps                  = $request->gps;
            $cart->bicycle_rack         = $request->bicycle_rack;
            $cart->music                = $request->music;
            $cart->collision_damage_waiver     = $request->collision_damage_waiver;
            $cart->theft_protection     = $request->theft_protection;
            $cart->rental_contact_fee   = $request->rental_contact_fee;
            $cart->personal_first_aid_service  = $request->personal_first_aid_service;
            $interval                   = $cart->pick_date->diff($cart->return_date);
            $cart->days                 = $interval->format('%a');
            $cart->created_at           = Carbon::now();
            $notification = array(
                'alert-type'    => 'success',
                'message'       => 'Reservation Successful!',
            );
            $cart->save();
            return redirect()->route('cart.manage')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        $created_at = Carbon::parse($cart->created_at);
        $today = Carbon::now();
        $days_difference = $created_at->diffInDays($today);

        if ($days_difference > 1) {
            $notification = array(
                'alert-type'    => 'error',
                'message'       => 'Your cart is older than 1 day, please start again!',
            );
            $cart->delete();
            return redirect()->route('listing')->with($notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->route('cart.manage');
        }
        return redirect()->route('cart.manage');
    }
}
