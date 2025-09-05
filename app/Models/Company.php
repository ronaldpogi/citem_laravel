<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_address_line',
        'company_year_strablished',
        'company_site',
        'company_brochure',
        'city_id',
        'region_id',
        'country_id',
        'user_id'
    ];

    /**
     * Relationships
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'company_city');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'company_region');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'company_country');
    }
}
