<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'code',
        'is_active',

    ];

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
