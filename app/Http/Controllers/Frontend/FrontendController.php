<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Cart;
use App\Models\District;
use App\Models\Division;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Protection;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('frontend.pages.others.about-us');
    }

    public function contact()
    {
        return view('frontend.pages.others.contact-us');
    }

    public function checkout()
    {
        $divisions = Division::where('status', 1)->orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->where('status', '1')->get();
        if (Auth::check()) {
            $savedDivisionId = Auth::user()->division_id;
            $savedDistrictId = Auth::user()->district_id;
        } else {
            $savedDivisionId = '';
            $savedDistrictId = '';
        }

        return view('frontend.pages.checkout', compact('divisions', 'districts', 'savedDivisionId', 'savedDistrictId'));
    }

    public function searchList(Request $request)
    {
        $name = $request->input('name');
        $startDate = new DateTime($request->pick_date);
        $endDate = new DateTime($request->return_date);
        $cars = Car::where('name', $name)
            ->whereDoesntHave('carts', function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->where(function ($query) use ($startDate) {
                        $query->where('pick_date', '<=', $startDate)
                            ->where('return_date', '>=', $startDate);
                    })->orWhere(function ($query) use ($endDate) {
                        $query->where('pick_date', '<=', $endDate)
                            ->where('return_date', '>=', $endDate);
                    })->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('pick_date', '>=', $startDate)
                            ->where('return_date', '<=', $endDate);
                    });
                });
            })->where('status', 1)->orderBy('id', 'asc')->paginate(10);

        return view('frontend.pages.listings.search-listing', compact('cars', 'startDate', 'endDate'));
    }

    public function listing()
    {
        $cars = Car::where('status', 1)->orderBy('name', 'asc')->paginate(10);

        return view('frontend.pages.listings.listing', compact('cars'));
    }

    public function singleList($slug)
    {
        $cDetails = Car::where('slug', $slug)->first();
        $extras = Extra::where('car_id', $cDetails->id)->first();
        $protections = Protection::where('car_id', $cDetails->id)->first();

        return view('frontend.pages.listings.single-listing', compact('cDetails', 'extras', 'protections'));
    }

    public function brandCar($slug)
    {
        $cars = Car::where('status', 1)->orderBy('id', 'desc')->get();
        $bDetails = Brand::where('slug', $slug)->where('status', 1)->first();

        return view('frontend.pages.listings.brand-listing', compact('bDetails', 'cars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userSetting($slug)
    {
        $user = User::where('slug', $slug)->first();
        if (! is_null($user)) {
            $divisions = Division::where('status', 1)->orderBy('priority', 'asc')->get();
            $districts = District::orderBy('name', 'asc')->where('status', '1')->get();
            $savedDivisionId = Auth::user()->division_id;
            $savedDistrictId = Auth::user()->district_id;

            return view('frontend.pages.accounts.settings', compact('user', 'divisions', 'districts', 'savedDivisionId', 'savedDistrictId'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->phone = $request->phone;
        $user->address_One = $request->address_One;
        $user->address_Two = $request->address_Two;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->post_code = $request->post_code;

        $notification = [
            'alert-type' => 'success',
            'message' => 'Information Have Been Updated!',
        ];

        $user->save();

        return redirect()->back()->with($notification);
    }

    public function userReserve()
    {
        $cart = Cart::select('order_id')->get();
        $orderHistory = Order::where('user_id', Auth::user()->id)->orderBy('inv_id', 'asc')->get();

        return view('frontend.pages.accounts.reserve-list', compact('orderHistory', 'cart'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservation($inv_id)
    {
        $reserve = Order::where('inv_id', $inv_id)->first();
        if (! is_null($reserve)) {
            return view('frontend.pages.accounts.reservation', compact('reserve'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerLogin()
    {
        return view('frontend.pages.authentication.login');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
