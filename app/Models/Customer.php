<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function groups()
    {
        return $this->belongsToMany(
            'App\Models\CustomerGroup',
            'customers_to_customer_groups'
        );
    }
}
