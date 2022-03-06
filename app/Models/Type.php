<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function route() {
        return $this->hasMany(Route::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}

