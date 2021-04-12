<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contest_id', 'insurance_id', 'type', 'method', 'amount'
    ];

    public function contest()
    {
        return $this->hasOne(Contest::class);
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }
}
