<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thesis extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUlids;

    protected $fillable = [
        'name',
        'nim',
        'title',
        'supervisor',
        'date',
        'room'
    ];
}
