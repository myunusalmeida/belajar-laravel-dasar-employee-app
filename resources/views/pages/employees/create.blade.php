@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl text-slate-900 font-bold">Tambah Employee</h1>
        <a href="{{ route('employees.index') }}" class="btn">Back</a>
    </div>

    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name">Nama Karyawan</label>
            <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="nip">NIP</label>
            <input type="number" name="nip" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="date_of_birth">Tanggal Lahir</label>
            <input type="date" name="date_of_birth" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="place_of_birth">Tempat Lahir</label>
            <input type="text" name="place_of_birth" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="address">Alamat Rumah</label>
            <textarea name="address" class="textarea textarea-bordered w-full" placeholder="Bio"></textarea>
        </div>
        <div class="mb-3">
            <label for="phone">Nomor Telepon</label>
            <input type="number" name="phone" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="email">Alamat Email</label>
            <input type="email" name="email" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="position">Position</label>
            <select name="position_id" class="select select-bordered w-full">
                <option>Pilih posisi?</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="photo">Foto</label>
            <input type="file" name="photo" class="input input-bordered w-full" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
