<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountingPoliciesDetails extends Model
{
    use HasFactory;

    public function accountingPolicy()
    {
        return $this->belongsTo('App\Models\AccountingPolicies', 'idAccountingPolicy', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }

    public function userRev() {
        return $this->belongsTo('App\Models\User', 'idUserRev', 'id');
    }

}
