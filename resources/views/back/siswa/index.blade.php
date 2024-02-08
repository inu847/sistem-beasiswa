@extends('layouts.admin')

@section('title')
Siswa
@endsection

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Table Siswa
</h2>
<!-- CTA -->

{{-- TEXT RIGHT --}}
{{-- <div class="block mb-4 text-sm text-right">
    <a href="{{ route('pendaftaran') }}"
        class="justify-between px-2 py-2 m-5 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">Tambah
        Siswa</a>
</div> --}}

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Tanggal Lahir</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Nilai</th>
                    <th class="px-4 py-3">Jenis Beasiswa</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($data as $item)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <a class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100" href="{{ route('siswa.show', [$item->id]) }}">{{ $item->name }}</a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $item->nis }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $item->birth }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $item->phone }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" href="{{ asset('storage/'.$item->nilai_rapor) }}" download="{{ $item->name.' - '.$item->nis }}">Download</a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ Str::ucfirst($item->type_beasiswa) }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{ $item->status }}</span>
                        </td>
                        
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    onclick="approve(event, {{ $item->id }})"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white rounded-lg bg-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                   Approve
                                </button>
                                <a
                                    href="{{ route('siswa.edit', [$item->id]) }}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <button
                                    onclick="confirmDelete(event, {{ $item->id }})"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
    
<script>
    function approve(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'Approve this registration.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var postForm = {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'POST',
                };
                $.ajax({
                    url: 'beasiswa/approve/'+id,
                    type: 'POST', 
                    data : postForm,
                    dataType  : 'json',
                })
                .done(function(data) {
                    Swal.fire('Approved!', data['message'], 'success');
                    location.reload();
                })
                .fail(function() {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                });
            }
        });
    }

    function confirmDelete(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var postForm = {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'DELETE',
                };
                $.ajax({
                    url: 'siswa/'+id,
                    type: 'POST', 
                    data : postForm,
                    dataType  : 'json',
                })
                .done(function(data) {
                    Swal.fire('Deleted!', data['message'], 'success');
                    location.reload();
                })
                .fail(function() {
                    Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');
                });
            }
        });
    }
</script>
@endpush