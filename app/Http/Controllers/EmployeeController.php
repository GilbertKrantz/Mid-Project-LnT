<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('welcome', compact('employees'));
    }

    public function create()
    {
        return view('createEmployee');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|numeric|min:20',
            'address' => 'required|min:10|max:40',
            'phone' => 'required|numeric|starts_with:08|digits_between:9,12',
        ]);

        Employee::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect('/welcome');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('editEmployee', compact('employee'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|numeric|min:20',
            'address' => 'required|min:10|max:40',
            'phone' => 'required|numeric|starts_with:08|digits_between:9,12',
        ]);

        Employee::findOrFail($id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect('/welcome');
    }

    public function delete($id)
    {
        Employee::destroy($id);

        return redirect('/welcome');
    }

}
