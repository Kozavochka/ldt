<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $industry_id
 * @property int $sub_industry_id
 * @property int $tax_id
 * @property double $staff
 * @property double $salary
 *
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
      'industry_id',
      'sub_industry_id',
      'tax_id',
      'staff',
      'salary',
    ];

    //Relation to Industry
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    //Relation to SubIndustry
    public function sub_industry()
    {
        return $this->belongsTo(SubIndustry::class);
    }

    //Relation to Tax
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    //Relation to region
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function getAllTaxAttribute()
    {
        return $this->tax->profit_tax+ $this->tax->property_tax + $this->tax->land_tax
            + $this->tax->ndfl + $this->tax->transport_tax + $this->tax->other_tax;
    }
}
