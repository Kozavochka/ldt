<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'profit_tax',
        'property_tax',
        'land_tax',
        'ndfl',
        'transport_tax',
        'other_tax',
    ];

    //Relation to Company
    public function company()
    {
        return $this->hasOne(Company::class);
    }

}
