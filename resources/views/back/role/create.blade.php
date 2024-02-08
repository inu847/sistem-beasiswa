@extends('layouts.admin')

@section('title')
Tambah Role
@endsection

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Tambah Role
</h2>

<form action="{{ route('role.store') }}" method='POST' enctype='multipart/form-data'>
    @csrf

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Role Name"
                name="name" />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Guard Name
            </span>
            <select
                name="guard_name"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="web">Web</option>
                <option value="api">Api</option>
            </select>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Menu
            </span>
            <select 
                name="menu_id" 
                id="menus" 
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                multiple>
                @foreach($menus as $menu)
                    <option value="" selected disabled>Select Menu</option>
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </label>

        <div class="block mt-4 text-sm">
            <button type='submit'
                class='px-4 py-2 mt-4 text-white bg-purple-600 rounded hover:bg-purple-900'>Submit</button>
        </div>
    </div>
</form>
@endsection