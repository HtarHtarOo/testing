<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Subcategory;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        //dd($items);
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        return view('backend.brands.create',compact('brands','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Validation
        $request->validate([
            "name"=>'required',
            "photo"=>'required',
            
        ]);
        
        //If include file,upload file
        $imageName=time().'-'.$request->photo->extension();

        $request->photo->move(public_path('backend/brandimg'),$imageName);

        $path='backend/brandimg/'.$imageName;
        //dd($path);
        //Data insert
        $brand=new Brand;
        $brand->name=$request->name;
        $brand->photo=$path;
        $brand->save();
        //redirect
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //$brands=Brand::all();
        //$subcategories=Subcategory::all();
        return view('backend.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //dd

        //validation
        $request->validate([
            "name"=>'required',
            "photo"=>'sometimes',
            "oldphoto"=>'required',
        ]);

        //file upload,if data
        if($request->hasFile('photo')){
            $imageName=time().'-'.$request->photo->extension();

        $request->photo->move(public_path('backend/brandimg'),$imageName);

        $path='backend/brandimg/'.$imageName;
        }else{
            $path=$request->oldphoto;
        }
        //data update
        $brand->name=$request->name;
        $brand->photo=$path;
        $brand->save();
        //redirect
        return redirect()->route('brands.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
