<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id', 'manager_id', 'title', 'contractor', 'opening',
        'warranty', 'type', 'published_in', 'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function financialProposal()
    {
        return $this->belongsTo(FinancialProposal::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }
}
