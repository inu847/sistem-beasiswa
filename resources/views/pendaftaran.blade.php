<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pendaftaran | Sistem Penerimaan Beasiswa</title>
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
        <form action='{{ route('siswa.store') }}' method='POST' enctype='multipart/form-data'>
          @csrf
          <div class="p-6 bg-white rounded-lg shadow">
            <div class="mb-8">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Siswa
              </h1>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nama" name="name" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">NIS</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan NIS" name="nis" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Tempat, Tanggal Lahir</span>
                <input
                  type="date"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Tempat, Tanggal Lahir" name="birth" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                <textarea name="address" id="" cols="30" rows="5" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Alamat"></textarea>
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Agama</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Agama" name="religion" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nomor Handphone</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nomor Handphone" name="phone" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Jenis Beasiswa</span>
                <select name="type_beasiswa"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  id="">
                  <option value="prestasi">Prestasi</option>
                  <option value="kurang mampu">Kurang Mampu</option>
                  <option value="kurang mampu">Prestasi & Kurang Mampu</option>
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
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Pas Foto" name="pas_foto" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Kwh Rumah</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Kwh Rumah" name="kwh_rumah" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nilai Rapor <small>(scan dokumen)</small></span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nilai Rapor" name="nilai_rapor" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak depan</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_depan" required/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak kiri</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_kiri" required/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak kanan</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_kanan" required/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tampak belakang</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tampak_belakang" required/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah dapur</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_dapur" required/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah tempat belajar</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_tempat_belajar" required/>
              </label>

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Foto Rumah foto bersama dalam rumah</span>
                <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Foto Rumah" name="foto_rumah_foto_bersama_dalam_rumah" required/>
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
                  placeholder="Masukkan Nama Ayah" name="nama_ayah" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nama Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nama Ibu" name="nama_ibu" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Pekerjaan Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Pekerjaan Ayah" name="pekerjaan_ayah" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Pekerjaan Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Pekerjaan Ibu" name="pekerjaan_ibu" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Alamat Orangtua</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Alamat Orangtua" name="alamat_ortu" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Homor Hp Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Homor Hp Ayah" name="no_hp_ayah" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Nomor Hp Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nomor Hp Ibu" name="no_hp_ibu" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Penghasilan Ayah</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Penghasilan Ayah" name="penghasilan_ayah" />
              </label>
              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Penghasilan Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Penghasilan Ibu" name="penghasilan_ibu" />
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