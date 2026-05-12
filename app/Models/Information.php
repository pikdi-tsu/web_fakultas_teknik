<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUlids;

    public $fillable = [
        'title',
        'description',
        'author',
        'category_id',
        'role_id',
        'created_at',
        'image'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
