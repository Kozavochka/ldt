<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubIndustry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    //Relation to Company
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
