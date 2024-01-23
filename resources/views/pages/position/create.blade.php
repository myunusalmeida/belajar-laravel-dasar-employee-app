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
            <input type="text" name="position_name" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="salary">Salary</label>
            <input type="number" name="salary" placeholder="Type here" class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="textarea textarea-bordered w-full" placeholder="Bio"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
