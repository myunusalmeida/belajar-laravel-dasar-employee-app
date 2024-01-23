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
