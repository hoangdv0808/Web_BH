<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Mail;

class HomeUserController extends Controller
{
    public function index(){
        $listCategory = Category::where('parent_id', 0)->get();
        $products = Product::limit(8)->orderBy('id','DESC')->get();
        $brands = Brand::get();
        return view('user.home', compact('products', 'brands', 'listCategory'));
    }
    public function privacy(){

        return view('user.privacy_policy');
    }

    public function product(Request $request){
        // dd($request->type, $request->name);
        $sort = $request->sort;
        $paramType = $request->type;
        $paramName = $request->name;
        $page = $request->query('page', 1);
        $category = Category::where('slug', $paramName !== 'all' ? $paramName : $paramType)->first();
        $listCategory = Category::where('parent_id', 0)->get();
        if($paramName !== 'all') {
            $productsDefault = Category::where('slug', $paramName)->first()->product()->get();
            $products = Category::where('slug', $paramName)->first()->product();
        } else {
            $productsDefault = DB::table('products as p')->join('categories as c', 'p.category_id', '=', 'c.id')->join('categories as c1', 'c.parent_id', '=', 'c1.id')->select('p.*')->where('c1.slug', '=', $paramType)->get();
            $products = DB::table('products as p')->join('categories as c', 'p.category_id', '=', 'c.id')->join('categories as c1', 'c.parent_id', '=', 'c1.id')->select('p.*')->where('c1.slug', '=', $paramType);
        }
        if($sort) {
            switch ($sort) {
                case '1':
                    $products = $products->orderBy('name', 'asc');
                    break;
                case '2':
                    $products = $products->orderBy('name', 'desc');
                    break;
                case '3':
                    $products = $products->orderBy('price', 'desc');
                    break;
                case '4':
                    $products = $products->orderBy('price', 'asc');
                    break;

                default:
                    break;
            }
        }
        $products = $products->paginate(24);
        return view('user.product', compact('products', 'category', 'productsDefault', 'page', 'paramType', 'paramName'));

    }

    public function sortProduct(Request $request) {
        $sort = $request->sort;
        $type = $request->type;
        $name = $request->name;
        return redirect()->route('category',['type'=>$type, 'name'=>$name, 'sort'=>$sort]);
    }

    public function search(Request $req){
        $results = Product::where('name','like','%'.$req->searchTerm.'%')->get();
        $count = $results->count();
        return view('user.search',compact('results','count'));
    }

    public function pay(){
        return view('user.pay');
    }

    public function detail($slug){
        $product = Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        return view('user.detail', compact('product','related'));
    }

    public function contact(){
        return view('user.contact');
    }
}
