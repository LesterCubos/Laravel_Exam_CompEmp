<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// Use the Company Model
use App\Models\Company;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;

class CompanyController extends Controller
{
    public function index(): Response
    {
        return response()->view('administrator.companies.index', [
            'companies' => Company::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('administrator.companies.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('images/companies/logos', request()->file('logo'));
            $validated['logo'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Company::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Company created successfully!');
            return redirect()->route('companies.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('administrator.companies.show', [
            'company' => Company::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('administrator.companies.form', [
            'company' => Company::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $company = Company::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            // delete image
            Storage::disk('public')->delete($company->logo);

            $filePath = Storage::disk('public')->put('images/companies/logos', request()->file('logo'), 'public');
            $validated['logo'] = $filePath;
        }

        $update = $company->update($validated);

        if($update) {
            session()->flash('notif.success', 'Company updated successfully!');
            return redirect()->route('companies.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $company = Company::findOrFail($id);

        Storage::disk('public')->delete($company->logo);
        
        $delete = $company->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Company deleted successfully!');
            return redirect()->route('companies.index');
        }

        return abort(500);
    }
}
