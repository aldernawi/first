<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctors extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'specialties_id',
        'dateofbrith',
        'gender',
        'adress',
        'phone',
        'note',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sp()
    {
        return $this->belongsTo(specialties::class, 'specialties_id');
    }
}
