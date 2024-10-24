<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
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
            $product = Product::where('name', 'like', '%'.$q.'%')->paginate(10);
        } else $product = Product::paginate(10);
        return view('Admin.Pages.Products.index', compact('product', 'q'));
    }

    public function search(Request $request) {
        $q = $request->q;
        return redirect()->route('product.index', 'q='.$q);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id', '<>', '0')->get();
        $brand = Brand::get();
        return view('Admin.Pages.Products.create', compact('category', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images/', $fileName);
            $request->merge(['thumbnail'=> $fileName]);

            $product = Product::create($request->all());
            if($product && $request->hasFile('photos')) {
                $files = $request->photos;
                foreach ($files as $key => $file) {
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('public/images', $fileName);
                    Image::create([
                        'product_id' => $product->id,
                        'thumbnail' => $fileName
                    ]);
                }
            }
            alert('Thêm mới thành công!', '', 'success');
            return redirect()->route('product.index');
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
        $product = Product::find($id);
        $category = Category::where('parent_id', '<>', '0')->get();
        $brand = Brand::get();
        return view('Admin.Pages.Products.edit', compact('product', 'category', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            if($request->hasFile('photo')) {
                $fileName = $request->photo->getClientOriginalName();
                $request->photo->storeAs('public/images/', $fileName);
                $request->merge(['thumbnail'=> $fileName]);
            }

            if($request->hasFile('photos')) {
                Image::where('product_id', $id)->delete();
                $files = $request->photos;
                foreach ($files as $key => $file) {
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('public/images', $fileName);
                    Image::create([
                        'product_id' => $id,
                        'thumbnail' => $fileName
                    ]);
                }
            }
            Product::find($id)->update($request->all());
            alert('Sửa thành công!', '', 'success');
            return redirect()->route('product.index');
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
        Image::where('product_id', $id)->delete();
        Product::destroy($id);
        return redirect()->route('product.index')->with('success', "Xóa thành công!");
    }
}
