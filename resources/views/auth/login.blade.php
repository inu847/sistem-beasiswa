<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login dan Profil Pengurus</title>
</head>

<body>
    <div class="min-h-screen items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            <!-- Bagian Login -->
            <div class="p-12 border rounded-lg shadow">
                <div class="h-15 md:h-auto md:w-1/3 md:mx-auto mb-4 pb-4">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('assets/img/logo-smanta.png') }}"
                        alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('assets/img/logo-smanta.png') }}" alt="Office" />
                </div>

                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                    Login
                </h1>
                <!-- Form login bisa ditambahkan di sini -->

                <div class="w-full mb-4">
                    <form action='' method='POST' enctype='multipart/form-data'>
                        @csrf
        
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">NIP/NISN</span>
                            <input name="niy"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="NIP/NISN" />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Password</span>
                            <input name="password"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="***************" type="password" />
                        </label>
        
                        <button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            type="submit">
                            Log in
                        </button>
                    </form>
                </div>
            </div>
        
            <!-- Bagian Profil Pengurus Sekolah -->
            <div class="p-12 border rounded-lg shadow">
                <div class="h-32 md:h-auto md:w-1/2 md:mx-auto mb-4 pb-4">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('assets/img/logo.png') }}"
                        alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('assets/img/logo.png') }}" alt="Office" />
                </div>

                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                    Tentang Tromol Pos 4
                </h1>
                <!-- Informasi profil pengurus sekolah bisa ditambahkan di sini -->

                <p class="mb-4 pb-4">Tromol pos adalah aplikasi beasiswa berbasis website yang dirancang untuk menerima dan mengajukan beasiswa. Dengan adanya aplikasi ini proses pengajuan dan penerimaan beasiswa menjadi lebih efisien dan dapat diakses oleh lebih banyak individu yang berpotensi mendapatkan dukungan keuangan untuk pendidikan.</p>

                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                    Profil Pengurus Sekolah
                </h1>
                <!-- Informasi profil pengurus sekolah bisa ditambahkan di sini -->

                <table class="table w-full text-left mb-4">
                    <tr>
                        <th width="200px">Koordinator</th>
                        <td width="10px">:</td>
                        <td>Setyo Budi</td>
                    </tr>

                    <tr>
                        <th width="200px">Bendahara</th>
                        <td width="10px">:</td>
                        <td>Ernawati Sri Rejeki</td>
                    </tr>

                    <tr>
                        {{-- SET HEADER ON TOP --}}
                        <th width="200px" style="vertical-align: top;">Suvior</th>
                        <td width="10px" style="vertical-align: top;">:</td>
                        <td>
                            <ol class="list-decimal list-inside">
                                <li>Sri Hartatik</li>
                                <li>Oky Eva Irianto</li>
                                <li>Sumiatun</li>
                                <li>Lilik Alwiyah</li>
                                <li>Bayu Anggara</li>
                                <li>Miatim Sumarti</li>
                            </ol>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
</body>

</html>