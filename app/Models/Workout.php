<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exercise;


class Workout extends Model
{
    use HasFactory;

    public function exercises() {
        return $this->hasMany(Exercise::class);
    }

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'date',
    ];
}
