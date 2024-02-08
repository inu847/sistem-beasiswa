<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Pendaftaran | Sistem Penerimaan Beasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css')}}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('assets/js/init-alpine.js')}}"></script>
</head>

<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto">
        {{-- CONTENT --}}
        <form action='{{ route('siswa.update', [$data->id]) }}' method='POST' enctype='multipart/form-data'>
          @csrf
          @method('PUT')

          <div class="p-6 bg-white rounded-lg shadow">
            <div class="mb-8">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Siswa
              </h1>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nama" name="name" value="{{ $data->name ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">NIS</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan NIS" name="nis" value="{{ $data->nis ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Tempat, Tanggal Lahir</span>
                <input
                  type="date"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Tempat, Tanggal Lahir" name="birth" value="{{ $data->birth ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                <textarea name="address" id="" cols="30" rows="5" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Alamat">{{ $data->address ?? null }}</textarea>
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Agama</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Agama" name="religion" value="{{ $data->religion ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nomor Handphone</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nomor Handphone" name="phone" value="{{ $data->phone ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Jenis Beasiswa</span>
                <select name="type_beasiswa"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  id="">
                  <option value="prestasi" {{ ($data->type_beasiswa == 'prestasi') ? 'selected' : '' }}>Prestasi</option>
                  <option value="kurang mampu" {{ ($data->type_beasiswa == 'kurang mampu') ? 'selected' : '' }}>Kurang Mampu</option>
                </select>
              </label>
            </div>

            <div class="mt-6">
              <h1 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                Dokumen
              </h1>
              <hr class="mb-4">
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Pas Foto</span>
                <a href="{{ $data->pas_foto }}" download="pas_foto" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Pas Foto" name="pas_foto" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Kwh Rumah</span>
                <a href="{{ $data->kwh_rumah }}" download="kwh_rumah" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Kwh Rumah" name="kwh_rumah" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nilai Rapor <small>(scan dokumen)</small></span>
                <a href="{{ $data->nilai_rapor }}" download="nilai_rapor" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nilai Rapor" name="nilai_rapor" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak depan</span>
                <a href="{{ $data->foto_rumah_tampak_depan }}" download="foto_rumah_tampak_depan" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_depan"/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak kiri</span>
                <a href="{{ $data->foto_rumah_tampak_kiri }}" download="foto_rumah_tampak_kiri" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_kiri"/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak kanan</span>
                <a href="{{ $data->foto_rumah_tampak_kanan }}" download="foto_rumah_tampak_kanan" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_kanan"/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak belakang</span>
                <a href="{{ $data->foto_rumah_tampak_belakang }}" download="foto_rumah_tampak_belakang" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_belakang"/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah dapur</span>
                <a href="{{ $data->foto_rumah_dapur }}" download="foto_rumah_dapur" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_dapur"/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tempat belajar</span>
                <a href="{{ $data->foto_rumah_tempat_belajar }}" download="foto_rumah_tempat_belajar" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tempat_belajar"/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah foto bersama dalam rumah</span>
                <a href="{{ $data->foto_rumah_foto_bersama_dalam_rumah }}" download="foto_rumah_foto_bersama_dalam_rumah" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">download</a>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_foto_bersama_dalam_rumah"/>
              </label>
            </div>

            <div class="mt-6">
              <h1 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                Perwalian
              </h1>
              <hr class="mb-4">

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nama Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nama Ayah" name="nama_ayah" value="{{ $data->nama_ayah ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nama Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nama Ibu" name="nama_ibu" value="{{ $data->nama_ibu ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Pekerjaan Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Pekerjaan Ayah" name="pekerjaan_ayah" value="{{ $data->pekerjaan_ayah ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Pekerjaan Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Pekerjaan Ibu" name="pekerjaan_ibu" value="{{ $data->pekerjaan_ibu ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Alamat Orangtua</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Alamat Orangtua" name="alamat_ortu" value="{{ $data->alamat_ortu ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Homor Hp Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Homor Hp Ayah" name="no_hp_ayah" value="{{ $data->no_hp_ayah ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nomor Hp Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nomor Hp Ibu" name="no_hp_ibu" value="{{ $data->no_hp_ibu ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Penghasilan Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Penghasilan Ayah" name="penghasilan_ayah" value="{{ $data->penghasilan_ayah ?? null }}" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Penghasilan Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Penghasilan Ibu" name="penghasilan_ibu" value="{{ $data->penghasilan_ibu ?? null }}" />
              </label>
              <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                  <input type="checkbox"
                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                  <span class="ml-2">
                    I agree to the
                    <span class="underline">privacy policy</span>
                  </span>
                </label>
              </div>
              <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit">
                Submit
              </button>
            </div>
          </div>
        </form>
        {{-- END CONTENT --}}
      </div>
    </div>
  </div>
</body>

</html>