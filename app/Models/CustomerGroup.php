<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    public function customers()
    {
        return $this->belongsToMany(
            'App\Models\Customer',
            'customers_to_customer_groups'
        );
    }
}
