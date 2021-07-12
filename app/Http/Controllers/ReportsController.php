<?php

namespace App\Http\Controllers;

use App\Models\AccountingPolicies;
use App\Models\AccountingPoliciesDetails;
use App\Models\Companies;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.show');
    }

    public function showaccountingpolicies()
    {
        $companies = Companies::with('accountingpolicies.details', 'accountingpolicies.details.user', 'accountingpolicies.details.userRev')->get();
        $companies = $companies->filter(function ($value, $key) {
            return count($value->accountingpolicies) > 0;
        });
        $companies = $companies->sortBy('name');

        return view('reports.accountingpolicies.show', ['companies' => $companies]);
    }

    public function showaccountingpolicy($id)
    {
        $detail = AccountingPoliciesDetails::with('accountingpolicy.company', 'user', 'userRev')->where('id', $id)->get();

        return view('reports.accountingpolicies.showpolicy', ['detail' => $detail[0]]);
    }
}
