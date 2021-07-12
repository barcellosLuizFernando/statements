<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountingPolicies;
use App\Models\AccountingPoliciesDetails;
use App\Models\Companies;
use App\Providers\Auth;

class AccountingPoliciesController extends Controller
{
    public function index()
    {
        $policies = AccountingPolicies::all();

        foreach ($policies as $policy) {
            $policy->companyName = Companies::where('id', $policy->idCompany)->first()->name;
        }

        return view('tools.accountingPolicies.show', ['policies' => $policies]);
    }

    public function create()
    {

        $companies = Companies::all();

        return view('tools.accountingPolicies.create', ['companies' => $companies]);
    }

    public function store(Request $request)
    {

        $policy = new AccountingPolicies();

        $policy->name = $request->policyName;
        $policy->idCompany = $request->companyName;

        $policy->save();

        return redirect('/tools/accountingpolicies');
    }

    public function storeDetail($id, Request $request)
    {
        $detail = new AccountingPoliciesDetails();

        $version = count(AccountingPolicies::with('details')->where('id', $id)->get()[0]->details);
        $version++;

        $detail->idAccountingPolicy = $id;
        $detail->date_start = date("Y/m/d");
        $detail->version = $version;
        $detail->idUserRev = Auth()->user()->id;
        $detail->idUser = Auth()->user()->id;
        $detail->text = $request->detailtext;

        $detail->save();

        return redirect('/tools/accountingpolicydetail/' . $id);
    }

    public function show($id)
    {

        $policy = AccountingPolicies::findOrFail($id);
        $companies = [Companies::findOrFail($policy->idCompany)];

        return view('tools.accountingPolicies.create', ['companies' => $companies, 'policy' => $policy]);
    }

    public function indexdetail($id)
    {
        //$policy = AccountingPolicies::findOrFail($id);
        $policy = AccountingPolicies::with('details', 'details.user', 'details.userRev', 'company')->where('id', $id)->get();

        return view('tools.accountingPolicies.detail.show', [
                'details' => $policy[0]->details,
                'policy' => $policy[0],
                'company' => $policy[0]->company]);
    }

    public function createdetail($id)
    {
        $policy = AccountingPolicies::findOrFail($id);
        $company = Companies::findOrFail($policy->idCompany);
        return view('tools.accountingPolicies.detail.create', ['policy' => $policy, 'company' => $company]);
    }

    public function showdetail($id, $idDetail)
    {
        $detail = AccountingPoliciesDetails::with('accountingPolicy.company')->where('id', $idDetail)->get();
        $policy = $detail[0]->accountingPolicy;
        $company = $policy->company;

        return view('tools.accountingPolicies.detail.create', ['policy' => $policy, 'company' => $company, 'detail' => $detail[0]]);
    }

    public function destroy($id)
    {
        AccountingPolicies::findOrFail($id)->delete();

        return redirect('/tools/accountingpolicies');
    }

    public function destroydetail($id, $idDetail)
    {
        AccountingPoliciesDetails::findOrFail($idDetail)->delete();

        return redirect('/tools/accountingpolicydetail/' . $id)->with('msg', 'Detalhamento da política de contabilização excluído com sucesso');
    }

    public function update(Request $request)
    {
        $policy = AccountingPolicies::findOrFail($request->id);

        $policy->name = $request->policyName;
        $policy->save();

        return redirect('/tools/accountingpolicies');
    }

    public function updateDetail(Request $request)
    {
        $detail = AccountingPoliciesDetails::findOrFail($request->idDetail);

        $detail->text = $request->detailtext;
        $detail->idUser = auth()->user()->id;
        $detail->save();

        return redirect('/tools/accountingpolicydetail/' . $request->id);
    }


}
