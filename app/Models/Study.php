<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'purpose',
        'focus',
        'focusDescription',
        'vision',
        'mission',
        'excellence',
        'graduate'
    ];

    public function cpl() {
        return $this->hasMany(Cpl::class);
    }
    public function subject() {
        return $this->hasMany(Subject::class);
    }
    public function curriculum() {
        return $this->hasMany(Curriculum::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
