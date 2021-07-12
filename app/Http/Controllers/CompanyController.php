<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Webmozart\PathUtil\Path;

class CompanyController extends Controller
{
    //
    public function index()
    {

        $companies = Companies::all();

        return view('reg.company.show', ['companies' => $companies]);
    }

    public function create()
    {


        return view('reg.company.create');
    }

    public function store(Request $request)
    {
        $company = new Companies;

        $company->name = $request->companyName;
        $company->email = $request->emailCompany;
        $imageName = '';

        if ($request->hasFile('logoFile') && $request->file('logoFile')->isValid()) {

            $requestImage = $request->logoFile;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->logoFile->move(public_path('img/companies'), $imageName);
        }

        $company->logo = $imageName;
        $company->save();

        return redirect('/reg/companies');
    }

    public function show($id)
    {
        $company = Companies::findOrFail($id);

        return view('reg.company.create', ['company' => $company]);
    }

    public function destroy($id)
    {
        Companies::findOrFail($id)->delete();

        return redirect('/reg/companies')->with('msg', 'Empresa excluída com sucesso.');
    }

    public function update(Request $request)
    {
        $company = Companies::findOrFail($request->id);

        $company->name = $request->companyName;
        $company->email = $request->emailCompany;
        $imageName = $company->logo;

        if ($request->hasFile('logoFile') && $request->file('logoFile')->isValid()) {

            $requestImage = $request->logoFile;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->logoFile->move(public_path('img/companies'), $imageName);
        }

        $company->logo = $imageName;

        $company->save();

        return redirect('/reg/companies')->with('msg', 'Empresa excluída com sucesso.');
    }

    public function run()
    {
        Companies::factory()
            ->count(15)
            ->create();

        return redirect('/reg/companies')->with('msg', 'Empresa excluída com sucesso.');
    }
}
