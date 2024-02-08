<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Perwalian;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::whereNull('status_beasiswa')->orWhere('status_beasiswa', 2)->orderBy('name', 'desc')->get();

        foreach ($data as $key => $value) {
            $value->status = ($value->status_beasiswa == 2) ? 'Ditolak' : 'Pendaftar Baru';
        }

        return view('back.siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->has('pas_foto')){
            $pas_foto = $request->file('pas_foto');
            $data['pas_foto'] = $pas_foto->store('pas_foto', 'public');
        }
        if($request->has('kwh_rumah')){
            $kwh_rumah = $request->file('kwh_rumah');
            $data['kwh_rumah'] = $kwh_rumah->store('kwh_rumah', 'public');
        }
        if($request->has('nilai_rapor')){
            $nilai_rapor = $request->file('nilai_rapor');
            $data['nilai_rapor'] = $nilai_rapor->store('nilai_rapor', 'public');
        }
        if($request->has('foto_rumah_tampak_depan')){
            $foto_rumah_tampak_depan = $request->file('foto_rumah_tampak_depan');
            $data['foto_rumah_tampak_depan'] = $foto_rumah_tampak_depan->store('foto_rumah_tampak_depan', 'public');
        }
        if($request->has('foto_rumah_tampak_kiri')){
            $foto_rumah_tampak_kiri = $request->file('foto_rumah_tampak_kiri');
            $data['foto_rumah_tampak_kiri'] = $foto_rumah_tampak_kiri->store('foto_rumah_tampak_kiri', 'public');
        }
        if($request->has('foto_rumah_tampak_kanan')){
            $foto_rumah_tampak_kanan = $request->file('foto_rumah_tampak_kanan');
            $data['foto_rumah_tampak_kanan'] = $foto_rumah_tampak_kanan->store('foto_rumah_tampak_kanan', 'public');
        }
        if($request->has('foto_rumah_tampak_belakang')){
            $foto_rumah_tampak_belakang = $request->file('foto_rumah_tampak_belakang');
            $data['foto_rumah_tampak_belakang'] = $foto_rumah_tampak_belakang->store('foto_rumah_tampak_belakang', 'public');
        }
        if($request->has('foto_rumah_dapur')){
            $foto_rumah_dapur = $request->file('foto_rumah_dapur');
            $data['foto_rumah_dapur'] = $foto_rumah_dapur->store('foto_rumah_dapur', 'public');
        }
        if($request->has('foto_rumah_tempat_belajar')){
            $foto_rumah_tempat_belajar = $request->file('foto_rumah_tempat_belajar');
            $data['foto_rumah_tempat_belajar'] = $foto_rumah_tempat_belajar->store('foto_rumah_tempat_belajar', 'public');
        }
        if($request->has('foto_rumah_foto_bersama_dalam_rumah')){
            $foto_rumah_foto_bersama_dalam_rumah = $request->file('foto_rumah_foto_bersama_dalam_rumah');
            $data['foto_rumah_foto_bersama_dalam_rumah'] = $foto_rumah_foto_bersama_dalam_rumah->store('foto_rumah_foto_bersama_dalam_rumah', 'public');
        }

        $siswa = Siswa::create($data);

        $dataPerwalian['nama_ayah'] = $data['nama_ayah'];
        $dataPerwalian['nama_ibu'] = $data['nama_ibu'];
        $dataPerwalian['pekerjaan_ayah'] = $data['pekerjaan_ayah'];
        $dataPerwalian['pekerjaan_ibu'] = $data['pekerjaan_ibu'];
        $dataPerwalian['alamat_ortu'] = $data['alamat_ortu'];
        $dataPerwalian['no_hp_ayah'] = $data['no_hp_ayah'];
        $dataPerwalian['no_hp_ibu'] = $data['no_hp_ibu'];
        $dataPerwalian['penghasilan_ayah'] = $data['penghasilan_ayah'];
        $dataPerwalian['penghasilan_ibu'] = $data['penghasilan_ibu'];
        $dataPerwalian['siswa_id'] = $siswa->id;
        $createPerwalian = Perwalian::create($dataPerwalian);

        return redirect()->back()->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $data['nama_ayah'] = $data->perwalian->nama_ayah ?? null;
        $data['nama_ibu'] = $data->perwalian->nama_ibu ?? null;
        $data['pekerjaan_ayah'] = $data->perwalian->pekerjaan_ayah ?? null;
        $data['pekerjaan_ibu'] = $data->perwalian->pekerjaan_ibu ?? null;
        $data['alamat_ortu'] = $data->perwalian->alamat_ortu ?? null;
        $data['no_hp_ayah'] = $data->perwalian->no_hp_ayah ?? null;
        $data['no_hp_ibu'] = $data->perwalian->no_hp_ibu ?? null;
        $data['penghasilan_ayah'] = $data->perwalian->penghasilan_ayah ?? null;
        $data['penghasilan_ibu'] = $data->perwalian->penghasilan_ibu ?? null;

        return view('back.siswa.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::find($id);
        $data['nama_ayah'] = $data->perwalian->nama_ayah ?? null;
        $data['nama_ibu'] = $data->perwalian->nama_ibu ?? null;
        $data['pekerjaan_ayah'] = $data->perwalian->pekerjaan_ayah ?? null;
        $data['pekerjaan_ibu'] = $data->perwalian->pekerjaan_ibu ?? null;
        $data['alamat_ortu'] = $data->perwalian->alamat_ortu ?? null;
        $data['no_hp_ayah'] = $data->perwalian->no_hp_ayah ?? null;
        $data['no_hp_ibu'] = $data->perwalian->no_hp_ibu ?? null;
        $data['penghasilan_ayah'] = $data->perwalian->penghasilan_ayah ?? null;
        $data['penghasilan_ibu'] = $data->perwalian->penghasilan_ibu ?? null;

        return view('back.siswa.edit', compact('data'));
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
        $data = $request->all();

        if($request->has('pas_foto')){
            $pas_foto = $request->file('pas_foto');
            $data['pas_foto'] = $pas_foto->store('pas_foto', 'public');
        }
        if($request->has('kwh_rumah')){
            $kwh_rumah = $request->file('kwh_rumah');
            $data['kwh_rumah'] = $kwh_rumah->store('kwh_rumah', 'public');
        }
        if($request->has('nilai_rapor')){
            $nilai_rapor = $request->file('nilai_rapor');
            $data['nilai_rapor'] = $nilai_rapor->store('nilai_rapor', 'public');
        }
        if($request->has('foto_rumah_tampak_depan')){
            $foto_rumah_tampak_depan = $request->file('foto_rumah_tampak_depan');
            $data['foto_rumah_tampak_depan'] = $foto_rumah_tampak_depan->store('foto_rumah_tampak_depan', 'public');
        }
        if($request->has('foto_rumah_tampak_kiri')){
            $foto_rumah_tampak_kiri = $request->file('foto_rumah_tampak_kiri');
            $data['foto_rumah_tampak_kiri'] = $foto_rumah_tampak_kiri->store('foto_rumah_tampak_kiri', 'public');
        }
        if($request->has('foto_rumah_tampak_kanan')){
            $foto_rumah_tampak_kanan = $request->file('foto_rumah_tampak_kanan');
            $data['foto_rumah_tampak_kanan'] = $foto_rumah_tampak_kanan->store('foto_rumah_tampak_kanan', 'public');
        }
        if($request->has('foto_rumah_tampak_belakang')){
            $foto_rumah_tampak_belakang = $request->file('foto_rumah_tampak_belakang');
            $data['foto_rumah_tampak_belakang'] = $foto_rumah_tampak_belakang->store('foto_rumah_tampak_belakang', 'public');
        }
        if($request->has('foto_rumah_dapur')){
            $foto_rumah_dapur = $request->file('foto_rumah_dapur');
            $data['foto_rumah_dapur'] = $foto_rumah_dapur->store('foto_rumah_dapur', 'public');
        }
        if($request->has('foto_rumah_tempat_belajar')){
            $foto_rumah_tempat_belajar = $request->file('foto_rumah_tempat_belajar');
            $data['foto_rumah_tempat_belajar'] = $foto_rumah_tempat_belajar->store('foto_rumah_tempat_belajar', 'public');
        }
        if($request->has('foto_rumah_foto_bersama_dalam_rumah')){
            $foto_rumah_foto_bersama_dalam_rumah = $request->file('foto_rumah_foto_bersama_dalam_rumah');
            $data['foto_rumah_foto_bersama_dalam_rumah'] = $foto_rumah_foto_bersama_dalam_rumah->store('foto_rumah_foto_bersama_dalam_rumah', 'public');
        }

        $siswa = Siswa::find($id);
        $update = $siswa->update($data);

        $dataPerwalian['nama_ayah'] = $data['nama_ayah'];
        $dataPerwalian['nama_ibu'] = $data['nama_ibu'];
        $dataPerwalian['pekerjaan_ayah'] = $data['pekerjaan_ayah'];
        $dataPerwalian['pekerjaan_ibu'] = $data['pekerjaan_ibu'];
        $dataPerwalian['alamat_ortu'] = $data['alamat_ortu'];
        $dataPerwalian['no_hp_ayah'] = $data['no_hp_ayah'];
        $dataPerwalian['no_hp_ibu'] = $data['no_hp_ibu'];
        $dataPerwalian['penghasilan_ayah'] = $data['penghasilan_ayah'];
        $dataPerwalian['penghasilan_ibu'] = $data['penghasilan_ibu'];
        $dataPerwalian['siswa_id'] = $siswa->id;
        $updatePerwalian = Perwalian::find($siswa->perwalian->id)->update($dataPerwalian);

        return redirect()->back()->with('success', 'Data berhasil dibuat!');

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::find($id);
        $data->delete();

        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
    }
}
