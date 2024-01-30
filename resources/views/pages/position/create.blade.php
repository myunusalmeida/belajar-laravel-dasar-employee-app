@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl text-slate-900 font-bold">Tambah Position</h1>
        <a href="{{ url('position') }}" class="btn">Back</a>
    </div>

    <form action="{{ url('position/store') }}" method="post">

        @csrf
        <div class="mb-3">
            <label for="position_name">Nama Posisi</label>
            <input type="text" name="position_name" placeholder="Type here" value="{{ old('position_name') }}"
                class="input input-bordered w-full" />
            @error('position_name')
                {{-- @if ($message == 'The position name field is required.')
                    <div class="alert alert-danger">Nama Posisi Harus Diisi</div>
                @elseif ($message == 'The position name has already been taken.')
                <div class="alert alert-danger">Nama Posisi Harus Beda dengan yang sudah ada</div>
                @endif --}}

                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="salary">Salary</label>
            <input type="text" name="salary" placeholder="Type here" class="input input-bordered w-full"
                value="{{ old('salary') }}" />
            @error('salary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="textarea textarea-bordered w-full" placeholder="Bio">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
