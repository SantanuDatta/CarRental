<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extras = Extra::orderBy('id', 'asc')->get();
        return view('backend.pages.extra.manage', compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::orderBy('name', 'asc')->get();
        return view('backend.pages.extra.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extra = new Extra();
        $extra->car_id              = $request->car_id;
        $extra->additional_driver   = $request->additional_driver;
        $extra->gps                 = $request->gps;
        $extra->bicycle_rack        = $request->bicycle_rack;
        $extra->music               = $request->music;

        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'Extras Have Been Added!',
        );

        $extra->save();
        return redirect()->route('extra.manage')->with($notification);
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
        $extra = Extra::find($id);
        if(!is_null($extra)){
            $cars = Car::orderBy('name', 'asc')->get();
            return view('backend.pages.extra.edit', compact('extra', 'cars'));
        }else{
            //404
        }
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
        $extra = Extra::find($id);
        $extra->additional_driver   = $request->additional_driver;
        $extra->gps                 = $request->gps;
        $extra->bicycle_rack        = $request->bicycle_rack;
        $extra->music               = $request->music;

        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'Extras Updated Successfully!',
        );

        $extra->save();
        return redirect()->route('extra.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extra = Extra::find($id);
        if(!is_null($extra)){
            $notification = array(
                'alert-type'    => 'error',
                'message'       => 'Extras Deleted Successfully!',
            );
            $extra->delete();
            return view('backend.pages.extra.manage')->with($notification);
        }else{
            //404
        }
    }
}
