<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    //
    protected $fillable = [
        'participation_name'
    ];

    public function optionsScope(): array
    {
        return [
            'value' => $this->id,
            'name'  => $this->participation_name,
        ];
    }
}
