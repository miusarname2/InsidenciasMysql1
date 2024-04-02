<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfInsidence extends Model
{
    use HasFactory;


    protected $fillable = [
        'TOI'
    ];

    public function insidences()
    {
        return $this->hasMany(Insidences::class, 'TypeOfInsidenceId');
    }
}
