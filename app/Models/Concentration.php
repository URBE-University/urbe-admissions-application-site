<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concentration extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'name'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
