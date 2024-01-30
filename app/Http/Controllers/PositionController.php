<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $items = Position::all();
        return view('pages.position.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.position.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position_name' => 'required|unique:positions',
            'salary' => 'required|numeric',
            'description' => 'required'
        ], [
            'position_name.required' => 'Please add a position name',
            'salary.required' => 'Please add a salary',
            'description.required' => 'Please add a description',

            'position_name.unique' => 'Harus ga sama',
            'salary.numeric' => 'Harus angka cuy',
        ]);

        $data = $request->all();
        Position::create($data);

        return redirect('/position');
    }

    public function edit($id)
    {
        // $item = Position::findOrFail($id);
        return view('pages.position.edit', [
            'item' => Position::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Position::findOrFail($id)->update($data);

        return redirect('/position');
    }

    public function delete($id)
    {
        Position::findOrFail($id)->delete();
        return redirect('/position');
    }
}
