<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name',
        'city_code'
    ];

    public function optionsScope(): array
    {
        return [
            'value' => $this->id,
            'name'  => $this->city_name,
        ];
    }
}
