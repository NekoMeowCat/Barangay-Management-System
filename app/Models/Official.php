<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        'term_start',
        'term_end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name', 'image']);
    }

    public function blottersInvolved()
    {
        return $this->hasMany(Blotter::class, 'officer_involved');
    }
}
