<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();

        return view('pages.employees.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();

        return view('pages.employees.create', [
            'positions' => $positions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->storeAs('employee', Str::slug($request->name) . '.jpg', 'public');

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $positions = Position::all();

        return view('pages.employees.edit', [
            'item' => $employee,
            'positions' => $positions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        if (!empty($data['photo'])) {
            $data['photo'] = $request->file('photo')->storeAs('employee', Str::slug($request->name) . '.jpg', 'public');
        } else {
            unset($data['photo']);
        }

        Employee::findOrFail($id)->update($data);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->back();
    }
}
