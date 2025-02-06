<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Owner;
use App\Models\Product;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activateCompanies = Company::where('companyStatus',1)->get(); 
        $deactivateCompanies = Company::where('companyStatus',0)->get();
        return view('companies.index',compact('activateCompanies','deactivateCompanies'));
    }
    // change company status
    public function changStatus($id){
        $company = Company::findOrFail($id);
        $company['companyStatus'] = !$company['companyStatus'];
        $company->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'companyName' => 'required',
            'companyAddress' => 'required',
            'companyTelephone' => 'required|numeric',
            'companyEmail' => 'required',
            'contactName' => 'required',
            'contactNumber' => 'required|numeric',
            'contactEmail' => 'required',
            'ownerName' => 'required',
            'ownerNumber' => 'required|numeric',
            'ownerEmail' => 'required',
        ]);
        $company = $request->only(['companyName','companyAddress','companyTelephone','companyEmail']);
        $companyCreated = Company::create($company);
        $companyId = $companyCreated->companyId;
        $contact = $request->only(['contactName','contactNumber','contactEmail']);
        $contact['companyId'] = $companyId;
        Contact::create($contact);

        $owner = $request->only(['ownerName','ownerNumber','ownerEmail']);
        $owner['companyId'] = $companyId;
        Owner::create($owner);

        return redirect()->route('companies');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::with(['contact','owner','product'])->findOrFail($id);
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::with(['contact','owner'])->findOrFail($id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'companyName' => 'required',
            'companyAddress' => 'required',
            'companyTelephone' => 'required|numeric',
            'companyEmail' => 'required',
            'contactName' => 'required',
            'contactNumber' => 'required|numeric',
            'contactEmail' => 'required',
            'ownerName' => 'required',
            'ownerNumber' => 'required|numeric',
            'ownerEmail' => 'required',
        ]);
        $company = $request->only(['companyName','companyAddress','companyTelephone','companyEmail']);
        $companyUpdated = Company::findOrFail($id)->update($company);

        $contact = $request->only(['contactName','contactNumber','contactEmail']);
        $contact['companyId'] = $id;
        Contact::where('companyId',$id)->update($contact);

        $owner = $request->only(['ownerName','ownerNumber','ownerEmail']);
        $owner['companyId'] = $id;
        Owner::where('companyId',$id)->update($owner);

        return redirect()->back();
    }
}
