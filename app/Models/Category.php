<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'CategoryName'
    ];

    public function insidences()
    {
        return $this->hasMany(Insidences::class, 'CategoryId');
    }

}
