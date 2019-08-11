<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Admin;
use App\Model\admin\Role;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all();
        return view('admin.user.show', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|max:50|unique:admins',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|min:9|numeric|unique:admins',
        ]);

        //$user = Admin::create($request->all());

        $user = new Admin();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user->password = Hash::make($request -> password);
        $user -> save();
        $user -> roles() -> sync($request -> role);

        return redirect(route('user.index'))->with('success','User is created successfully');

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
        $user = Admin::find($id);
        $roles = Role::all();

        return view('admin.user.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|max:50|unique:admins',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|min:9|numeric|unique:admins',
        ]);

        //$user = Admin::where('id',$id)->update($request->except('_token'));
        $user = Admin::find($id);
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> password = $request -> password;
        $user -> roles() -> sync($request -> role);
        $user -> save();

        return redirect(route('user.index'))->with('success','User is updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id',$id)->delete();

        return redirect()->back()->with('success','User is deleted successfully');
    }
}
