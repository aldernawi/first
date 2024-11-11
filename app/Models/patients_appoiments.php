<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class patients_appoiments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pation_id',
        'doctor_id',
        'tc_id',
        'section_id',
        'date',
        'note',
        'status',
    ];

    public function tc()
    {
        return $this->belongsTo(treatmentCenters::class, 'tc_id');
    }

    public function doctors()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
