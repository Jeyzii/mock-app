<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewCompanyNotification;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::simplePaginate(10);
        return view('company.read', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        try {
            $logoPath = null;

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('public/Company-Logos');
                if (!Storage::exists('public/Company-Logos')) {
                    Storage::makeDirectory('public/Company-Logos');
                }
            }

            $company = new Company;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->web_url = $request->web_url;
            $company->logo = $logoPath ? Storage::url($logoPath) : null;
            $company->save();

            $company->notify(new NewCompanyNotification($company));

            return redirect('/companies')->with('success', 'Company created');
        } catch (\Exception $e) {
            return redirect('/companies')->with('error', 'Failed to create company');
        }
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
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        try{
            $logoPath = null;
        
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('public/Company-Logos');
            }
        
            $company = Company::findOrFail($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->web_url = $request->web_url;
            $company->logo = $logoPath ? Storage::url($logoPath) : null;
            $company->save();
        
            return redirect('/companies')->with('success', 'Company updated');
        } catch (\Exception $e) {
            return redirect('/companies')->with('error', 'Failed to update company');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $company = Company::findOrFail($id);
    
            if ($company->logo) {
                $logoPath = str_replace('/storage', 'public', $company->logo);
                if (Storage::exists($logoPath)) {
                    Storage::delete($logoPath);
                }
            }
    
            $company->delete();
    
            return redirect('/companies')->with('success', 'Company deleted');
        } catch (\Exception $e) {
            return redirect('/companies')->with('error', 'Failed to delete company');
        }
    }
}
