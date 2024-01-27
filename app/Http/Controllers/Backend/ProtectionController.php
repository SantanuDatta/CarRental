<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Protection;
use Illuminate\Http\Request;

class ProtectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protections = Protection::orderBy('id', 'asc')->get();

        return view('backend.pages.protection.manage', compact('protections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::orderBy('name', 'asc')->get();

        return view('backend.pages.protection.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $protection = new Protection();
        $protection->car_id = $request->car_id;
        $protection->collision_damage_waiver = $request->collision_damage_waiver;
        $protection->theft_protection = $request->theft_protection;
        $protection->rental_contact_fee = $request->rental_contact_fee;
        $protection->personal_first_aid_service = $request->personal_first_aid_service;

        $notification = [
            'alert-type' => 'success',
            'message' => 'Protections Have Been Added!',
        ];

        $protection->save();

        return redirect()->route('protection.manage')->with($notification);
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
        $protection = Protection::find($id);
        if (! is_null($protection)) {
            $cars = Car::orderBy('name', 'asc')->get();

            return view('backend.pages.protection.edit', compact('protection', 'cars'));
        } else {
            //404
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $protection = Protection::find($id);
        $protection->collision_damage_waiver = $request->collision_damage_waiver;
        $protection->theft_protection = $request->theft_protection;
        $protection->rental_contact_fee = $request->rental_contact_fee;
        $protection->personal_first_aid_service = $request->personal_first_aid_service;

        $notification = [
            'alert-type' => 'success',
            'message' => 'Protections Updated Successfully!',
        ];

        $protection->save();

        return redirect()->route('protection.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protection = Protection::find($id);
        if (! is_null($protection)) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'Protections Deleted Successfully!',
            ];
            $protection->delete();

            return view('backend.pages.protection.manage')->with($notification);
        } else {
            //404
        }
    }
}
