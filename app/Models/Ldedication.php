<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ldedication extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'year', 
        'lecturer_id'
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
