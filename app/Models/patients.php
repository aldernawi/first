<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class patients extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dig',
        'dateofbrith',
        'gender',
        'adress',
        'phone',
        'note',
        'user_id',
        'tc_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tc()
    {
        return $this->belongsTo(treatmentCenters::class, 'tc_id');
    }
}
