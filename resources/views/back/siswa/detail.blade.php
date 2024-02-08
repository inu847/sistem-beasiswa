@extends('layouts.admin')

@section('title')
Detail Siswa
@endsection

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Detail Siswa
</h2>

<div>
    <div>
        <table class="text-left m-5 p-5">
            <tr>
                <th>Nama</th>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <th>NIS</th>
                <td>{{ $data->nis }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $data->birth }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $data->address }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $data->religion }}</td>
            </tr>
            <tr>
                <th>Nomor Handphone</th>
                <td>{{ $data->phone }}</td>
            </tr>
            <tr>
                <th>Jenis Beasiswa</th>
                <td>{{ $data->type_beasiswa }}</td>
            </tr>
            <tr>
                <th>Pas Foto</th>
                <td>
                    <img src="{{ asset('storage/'.$data->pas_foto) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Kwh Rumah</th>
                <td>
                    <img src="{{ asset('storage/'.$data->kwh_rumah) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Nilai Rapor</th>
                <td>
                    <img src="{{ asset('storage/'.$data->nilai_rapor) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah tampak depan</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_tampak_depan) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah tampak kiri</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_tampak_kiri) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah tampak kanan</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_tampak_kanan) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah tampak belakang</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_tampak_belakang) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah dapur</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_dapur) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah tempat belajar</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_tempat_belajar) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Foto Rumah foto bersama dalam rumah</th>
                <td>
                    <img src="{{ asset('storage/'.$data->foto_rumah_foto_bersama_dalam_rumah) }}" width="1000px" alt="">
                </td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td>{{ $data->nama_ayah }}</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>{{ $data->nama_ibu }}</td>
            </tr>
            <tr>
                <th>Pekerjaan Ayah</th>
                <td>{{ $data->pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <th>Pekerjaan Ibu</th>
                <td>{{ $data->pekerjaan_ibu }}</td>
            </tr>
            <tr>
                <th>Alamat Orangtua</th>
                <td>{{ $data->alamat_ortu }}</td>
            </tr>
            <tr>
                <th>Homor Hp Ayah</th>
                <td>{{ $data->no_hp_ayah }}</td>
            </tr>
            <tr>
                <th>Nomor Hp Ibu</th>
                <td>{{ $data->no_hp_ibu }}</td>
            </tr>
            <tr>
                <th>Penghasilan Ayah</th>
                <td>{{ $data->penghasilan_ayah }}</td>
            </tr>
            <tr>
                <th>Penghasilan Ibu</th>
                <td>{{ $data->penghasilan_ibu }}</td>
            </tr>
        </table>
@endsection