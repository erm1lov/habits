<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    public function scopeActive($query) {
        return $query->where('is_active', 1);
    }

    public function scopeLang($query) {
        return $query->where('lang', auth()->user()->lang);
    }
}
