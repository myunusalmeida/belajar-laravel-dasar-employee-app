@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl text-slate-900 font-bold">Edit Position</h1>
        <a href="{{ url('position') }}" class="btn">Back</a>
    </div>

    <form action="{{ url('position/update/' . $item->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="position_name">Nama Posisi</label>
            <input type="text" name="position_name" value="{{ $item->position_name }}" placeholder="Type here"
                class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="salary">Salary</label>
            <input type="number" name="salary" value="{{ $item->salary }}" placeholder="Type here"
                class="input input-bordered w-full" />
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="textarea textarea-bordered w-full" placeholder="Bio">{{ $item->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
