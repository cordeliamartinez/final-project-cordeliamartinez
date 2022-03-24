<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function difficulty() {
        return $this->belongsTo(Difficulty::class);
    }

    public function terrain() {
        return $this->belongsTo(Terrain::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

}
