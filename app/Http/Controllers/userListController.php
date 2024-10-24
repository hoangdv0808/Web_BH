<?php

namespace App\Http\Controllers;

use App\Http\Requests\userListRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class userListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login_admin() {
        return view('Admin.Pages.User-management.login');
    }

    public function post_login_admin(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout_admin() {
        if(Auth::logout()) {
            return redirect()->route('userList.admin.login');
        } return redirect()->route('home');
    }

    public function index(Request $request)
    {
        $userAcc = User::where('role', 1)->get();
        $adminAcc = User::where('role', 0)->paginate(10);
        return view('Admin.Pages.User-management.index', compact('userAcc', 'adminAcc'));
    }

    public function search(Request $request) {
        $q = $request->q;
        return redirect()->route('userList.index', 'q='.$q);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $form = $request->query('form');
        return view('Admin.Pages.User-management.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userListRequest $request)
    {
        try {
            $form = $request->form;
            if($form == 'admin') $request->merge(['role' => 1]);
            else $request->merge(['role' => 0]);
            $request->merge(["password" => Hash::make($request->password)]);
            User::create($request->all());
            alert('Thêm mới thành công!','', 'success');
            return redirect()->route('userList.index', 'key='.$form)->with('success', "Thêm mới thành công!");
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
    public function edit(Request $request, $id)
    {
        $account = User::find($id);
        // dd($form);
        return view('Admin.Pages.User-management.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userListRequest $request, $id)
    {
        try {
            User::find($id)->update($request->all());
            alert('Sửa thành công!','', 'success');
            return redirect()->route('userList.index')->with('success', "Sửa thành công!");
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
        User::destroy($id);
        return redirect()->route('userList.index');
    }
}
