<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'asc')->get();

        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->status = $request->status;
        if ($request->image) {
            $image = $request->file('image');
            $img = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/img/brands/'.$img);
            $imageResize = Image::make($image);
            $imageResize->resize(300, 300)->save($location);
            $brand->image = $img;
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'New Brand Added!',
        ];

        $brand->save();

        return redirect()->route('brand.manage')->with($notification);
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
        $brand = Brand::find($id);
        if (! is_null($brand)) {
            return view('backend.pages.brand.edit', compact('brand'));
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
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->status = $request->status;
        if ($request->image) {
            if (File::exists('backend/img/brands/'.$brand->image)) {
                File::delete('backend/img/brands/'.$brand->image);
            }
            $image = $request->file('image');
            $img = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/img/brands/'.$img);
            $imageResize = Image::make($image);
            $imageResize->resize(300, 300)->save($location);
            $brand->image = $img;
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Brand Updated Successfully!',
        ];

        $brand->save();

        return redirect()->route('brand.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (! is_null($brand)) {
            if (File::exists('backend/img/brands/'.$brand->image)) {
                File::delete('backend/img/brands/'.$brand->image);
            }
            $notification = [
                'alert-type' => 'error',
                'message' => 'Brand Has Been Removed!',
            ];
            $brand->delete();

            return redirect()->route('brand.manage')->with($notification);
        } else {
            //404
        }
    }
}
