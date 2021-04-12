<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialProposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['contest_id', 'with_iva', 'without_iva', 'iva_amount'];

    public function contest()
    {
        return $this->hasOne(Contest::class);
    }
}
