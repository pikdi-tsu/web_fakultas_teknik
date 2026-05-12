<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUlids;

    protected $fillable = [
        'name',
        'position',
        'description',
        'program',
        'picture'
    ];

    public function lpublication(){
        return $this->hasMany(Lpublication::class);
    }
    public function ldedication(){
        return $this->hasMany(Ldedication::class);
    }
    public function lintelectual(){
        return $this->hasMany(Lintelectual::class);
    }
}
