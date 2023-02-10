<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBY('id', 'desc')->get();
        return view('backend.pages.car.manage', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        return view('backend.pages.car.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        $car->brand_id     = $request->brand_id;
        $car->name         = $request->name;
        $car->slug         = Str::slug($request->name);
        $car->description  = $request->description;
        $car->rent         = $request->rent;
        $car->features     = $request->features;
        $car->status       = $request->status;
        if($request->image){
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/cars/' . $img);
            $imageResize = Image::make($image);
            $imageResize->fit(600, 380)->save($location);
            $car->image = $img;
        }

        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'New car Added!',
        );

        $car->save();
        return redirect()->route('car.manage')->with($notification);
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
        $car = Car::find($id);
        if(!is_null($car)){
            $brands = Brand::orderBy('name', 'asc')->get();
            return view('backend.pages.car.edit', compact('car', 'brands'));
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
        $car = Car::find($id);
        $car->brand_id     = $request->brand_id;
        $car->name         = $request->name;
        $car->slug         = Str::slug($request->name);
        $car->description  = $request->description;
        $car->rent         = $request->rent;
        $car->features     = $request->features;
        $car->status       = $request->status;
        if($request->image){
            if(File::exists('backend/img/cars/' . $car->image)){
                File::delete('backend/img/cars/' . $car->image);
            }
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/cars/' . $img);
            $imageResize = Image::make($image);
            $imageResize->fit(600, 380)->save($location);
            $car->image = $img;
        }
        
        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'Car Updated Successfully!',
        );

        $car->save();
        return redirect()->route('car.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        if(!is_null($car)){
            if(File::exists('backend/img/cars/' . $car->image)){
                File::delete('backend/img/cars/' . $car->image);
            }
            $notification = array(
                'alert-type'    => 'error',
                'message'       => 'Car Has Been Removed!',
            );
            $car->extras()->delete();
            $car->protections()->delete();
            $car->orders()->delete();
            $car->carts()->delete();
            $car->delete();
            return redirect()->route('car.manage')->with($notification);
        }else{
            //404
        }
    }
}
