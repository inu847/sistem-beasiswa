<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::orderBy('name', 'desc')->get();

        return view('back.role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:roles,name',
            'guard_name' => 'required',
            'menu_id'     => 'required|array',
        ]);

        $data = $request->all();

        $create = Role::create($data);
        $create->syncPermissions($request->menu_id);

        return redirect()->route('role.index')->with('success', 'Data berhasil dibuat!');
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
        return view('back.role.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|unique:roles,name',
            'guard_name' => 'required',
            'menu_id'     => 'required|array',
        ]);

        $data = $request->all();

        $create = Role::find($id)->update($data);
        $create->syncPermissions($request->menu_id);

        return redirect()->route('role.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::find($id);
        $data->delete();

        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
    }
}
