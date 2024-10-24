<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = request()->q;
        if($q) {
            $brand = Brand::where('name', 'like', '%'.$q.'%')->paginate(10);
        } else $brand = Brand::paginate(10);
        return view('Admin.Pages.Brands.index', compact('brand', 'q'));
    }


    public function search(Request $request) {
        $q = $request->q;
        return redirect()->route('brand.index', 'q='.$q);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Pages.Brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images/', $fileName);
            $request->merge(['thumbnail'=> $fileName]);
            Brand::create($request->all());
            alert('Thêm mới thành công!', '', 'success');
            return redirect()->route('brand.index');
        } catch (\Throwable $th) {
            throw $th;
            alert('Thêm mới thất bại!', '', 'error');
            return redirect()->back();
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
        return view('Admin.Pages.Brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        try {
            if($request->hasFile('photo')) {
                $fileName = $request->photo->getClientOriginalName();
                $request->photo->storeAs('public/images/', $fileName);
                $request->merge(['thumbnail'=> $fileName]);
            }
            Brand::find($id)->update($request->all());
            alert('Sửa thành công!', '', 'success');
            return redirect()->route('brand.index');
        } catch (\Throwable $th) {
            throw $th;
            alert('Sửa thất bại!', '', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listIdProduct = Product::where('brand_id', $id)->select('id')->get()->map(function ($item) {return $item->id;});
        $arr = [];
        foreach ($listIdProduct as $key => $value) {
            array_push($arr, $value);
        }
        // dd($listIdProduct);
        Image::whereIn('product_id', $arr)->delete();
        Product::where('brand_id', $id)->delete();
        Brand::destroy($id);
        return redirect()->route('brand.index')->with('success', "Xóa thành công!");
    }
}
