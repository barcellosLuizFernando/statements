<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;


    public function accountingPolicies()
    {
        return $this->hasMany('App\Models\AccountingPolicies', 'idCompany', 'id');
    }
}
