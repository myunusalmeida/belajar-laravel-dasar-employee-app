@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl text-slate-900 font-bold">Karyawan</h1>
        <a href="{{ route('employees.create') }}" class="btn">Buat Baru</a>
    </div>

    @if (session()->has('success'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>NIP</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Place</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $key => $item)
                    <tr>
                        <th>
                            <img src="{{ url('storage/' . $item->photo) }}" alt="" class="w-24 h-24">
                        </th>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->place_of_birth }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            {{ $item->position->position_name }}
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('employees.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-error btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
