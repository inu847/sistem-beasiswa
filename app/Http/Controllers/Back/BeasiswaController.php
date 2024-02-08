<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::where('status_beasiswa', 1)->orderBy('name', 'desc')->get();

        foreach ($data as $key => $value) {
            $value->status = ($value->status_beasiswa == 1) ? 'Disetujui' : 'Ditolak';
        }

        return view('back.beasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.beasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('back.beasiswa.edit');
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
        $create = Siswa::find($id);
        $create->status_beasiswa = 1;
        $create->save();

        return redirect()->route('siswa.index')->with('success', 'Approve Beasiswa Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id)
    {
        $create = Siswa::find($id);
        $create->status_beasiswa = 1;
        $create->save();

        return response()->json(['message' => 'Approve Beasiswa Success']);
    }

    public function reject($id)
    {
        $create = Siswa::find($id);
        $create->status_beasiswa = 2;
        $create->save();

        return response()->json(['message' => 'Reject Beasiswa Success']);
    }
}
