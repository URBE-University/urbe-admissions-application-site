<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree_id',
        'name'
    ];

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function concentrations()
    {
        return $this->hasMany(Concentration::class);
    }
}
