<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permission.show', compact(['permissions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' => 'required|max:50|unique:permissions',
            'for' => 'required'
        ]);

        $permission = new Permission();
        $permission -> name = $request -> name;
        $permission->for = $request->for;
        $permission -> save();

        return redirect(route('permission.index'))->with('success','Permission Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission $permission
     * @return void
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission = Permission::find($permission -> id);

        return view('admin.permission.edit', compact(['permission']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\admin\Permission $permission
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Permission $permission)
    {
        $this ->validate($request,[
            'name' => 'required|max:50',
            'for' => 'required',
        ]);

        $permission = Permission::find($permission->id);
        $permission -> name = $request->name;
        $permission->for = $request->for;
        $permission->save();

        return redirect(route('permission.index'))->with('success','Permission Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission ->id)->delete();

        return redirect()->back()->with('success','Permission Deleted');
    }
}
