@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl text-slate-900 font-bold">Position</h1>
        <a href="{{ url('position/tambah') }}" class="btn">Buat Baru</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Position Name</th>
                    <th>Salary</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <td>{{ $item->position_name }}</td>
                        <td>Rp. {{ number_format($item->salary) }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ url('position/edit/' . $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('position/delete/' . $item->id) }}" method="post">
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
