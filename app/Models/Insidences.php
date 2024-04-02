<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insidences extends Model
{
    use HasFactory;


    protected $fillable = [
        'CategoryId',
        'ReporterName',
        'TypeOfInsidenceId',
        'AreaId',
        'VenueSpecific'
    ];

    protected $casts =[
        'CategoryId' => 'int',
        'ReporterName' => 'string',
        'TypeOfInsidenceId' => 'int',
        'AreaId' => 'int',
        'VenueSpecific'=> 'string'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId');
    }

    public function typeOfIncidence()
    {
        return $this->belongsTo(TypeOfInsidence::class, 'TypeOfInsidenceId');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'AreaId');
    }
}
