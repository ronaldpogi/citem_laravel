<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'region_name',
        'region_code',
    ];

    public function optionsScope(): array
    {
        return [
            'value' => $this->id,
            'name'  => $this->region_name,
        ];
    }
}
