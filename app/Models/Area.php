<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'NameArea'
    ];

    public function insidences()
    {
        return $this->hasMany(Insidences::class, 'AreaId');
    }
}
