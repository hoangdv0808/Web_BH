<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->query('key');
        $q = request()->q;
        if(!$key) $key = 'dm';
        $categoryList = Category::where('parent_id', '0')->paginate(10)->withQueryString();
        $categoryProduct = Category::where('parent_id', '<>','0')->paginate(10)->withQueryString();
        if($q && $key === 'dm') $categoryList = Category::where('name', 'like', '%'.$q.'%')->where('parent_id', '0')->paginate(10)->withQueryString();
        else if($q && $key === 'dmsp') $categoryProduct = Category::where('name', 'like', '%'.$q.'%')->where('parent_id', '<>','0')->paginate(10)->withQueryString();

        // $categoryList = Category::where('parent_id', '0')->paginate(10);
        // $categoryProduct = Category::where('parent_id', '<>','0')->paginate(10)->withQueryString();
        return view('Admin.Pages.Category.index', compact('key', 'categoryList', 'categoryProduct', 'q'));
    }

    public function search(Request $request) {
        $q = $request->q;
        $key = $request->key;
        return redirect()->route('category.index', 'q='.$q.'&key='.$key);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $form = $request->query('form');
        $categoryParent =  Category::where('parent_id', '0')->get();
        return view('Admin.Pages.Category.create', compact('form', 'categoryParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $form = $request->form;
            Category::create($request->all());
            alert('Thêm mới thành công!','', 'success');
            return redirect()->route('category.index', 'key='.$form)->with('success', "Thêm mới thành công!");
        } catch (\Throwable $th) {
            throw $th;
            alert('Thêm mới thất bại!','', 'error');
            return redirect()->back()->with('error', "Thêm mới thất bại!");
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
        $category = Category::find($id);
        $categoryList = Category::where('parent_id', '0')->get();
        return view('Admin.Pages.Category.edit', compact('category', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $form = Category::find($id)->parent_id !== 0 ? 'dmsp' : 'dm';
            Category::find($id)->update($request->all());
            alert('Sửa thành công!','', 'success');
            return redirect()->route('category.index', 'key='.$form)->with('success', "Sửa thành công!");
        } catch (\Throwable $th) {
            throw $th;
            alert('Sửa thất bại!','', 'error');
            return redirect()->back()->with('error', "Sửa thất bại!");
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
        $form = Category::find($id)->parent_id !== 0 ? 'dmsp' : 'dm';
        Category::destroy($id);
        return redirect()->route('category.index', 'key='.$form)->with('success', "Xóa thành công!");
    }
}
