<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'country_name',
        'country_code',
    ];

    public function optionsScope(): array
    {
        return [
            'value' => $this->id,
            'name'  => $this->country_name,
        ];
    }
}
