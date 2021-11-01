<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function group()
    {
        return $this->belongsTo(CustomerGroup::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
