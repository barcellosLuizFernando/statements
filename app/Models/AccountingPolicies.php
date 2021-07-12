<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingPolicies extends Model
{
    use HasFactory;


    protected $dates = ['date_start'];

    protected $guarded = [];

    public function company() {
        return $this->belongsTo('App\Models\Companies', 'idCompany', 'id');
    }

    public function details() {
        return $this->hasMany('App\Models\AccountingPoliciesDetails', 'idAccountingPolicy', 'id');
    }

}
