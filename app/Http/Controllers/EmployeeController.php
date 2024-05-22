<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// Use the Company Model
use App\Models\Employee;
use App\Models\Company;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;


class EmployeeController extends Controller
{
    public function index(): Response
    {
        return response()->view('administrator.employees.index', [
            'employees' => Employee::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('administrator.employees.form', [
            'companies' => Company::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = Employee::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Employee created successfully!');
            return redirect()->route('employees.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('administrator.employees.show', [
            'employee' => Employee::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('administrator.employees.form', [
            'employee' => Employee::findOrFail($id), 'companies' => Company::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $employee= Employee::findOrFail($id);
        $validated = $request->validated();

        $update = $employee->update($validated);

        if($update) {
            session()->flash('notif.success', 'Employee updated successfully!');
            return redirect()->route('employees.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);
        
        $delete = $employee->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Employee deleted successfully!');
            return redirect()->route('employees.index');
        }

        return abort(500);
    }
}
