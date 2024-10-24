<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\order_detail;
use App\Helper\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $req, Cart $cart)

    {
        if (!auth()->check()) {
            return redirect()->route('user.login')->with('error', 'Bạn cần đăng nhập trước khi đặt hàng.');
        }
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string|max:255',
            // 'terms' => 'accepted',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập trường này',
            'email' => 'email không hợp lệ.',
            'accepted' => 'Bạn phải chấp nhận các điều khoản.',
        ];
        $validator = Validator::make($req->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (auth()->check()) {
            $user = auth()->user();
            $user_id = $user->id;
            $totalPrice = $cart->getTotalPrice();
            $name = $req->input('name');

            $order = Order::create([
                'user_id' => $user_id,
                'name' => $name,
                'email' => $req->input('email'),
                'address' => $req->input('address'),
                'phone' => $req->input('phone'),
                // 'status' => $req->input('status'),
                'note' => $req->input('note'),
            ]);

            if ($order) {
                $order_id = $order->id;
                foreach ($cart->list() as $product_id => $item) {
                    $quantity = $item['quantity'];
                    $total_price = $item['price'];

                    $orderDetail = order_detail::create([
                        'order_id' => $order_id,
                        'product_id' => $product_id,
                        'total' => $total_price,
                        'quantity' => $quantity,
                    ]);
                }
                session()->forget('cart');
            }
        }
        if ($order && $orderDetail) {
            Session::flash('success', 'Đơn hàng của bạn đã được đặt thành công!');
            return redirect()->route('user.home')->with('alert', 'success');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
    }

    public function index() {
        $orders = order::get();
        // dd($orders->orderDetail()->first()->product()->get());
        return view('Admin.Pages.Orders.index', compact('orders'));
    }

    public function update(Request $request, $id) {
        try {
            order::find($id)->update($request->all());
            return redirect()->route('order.index');
        } catch (\Throwable $th) {
        }
     }
}
