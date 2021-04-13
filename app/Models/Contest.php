<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contest.
 *
 * @package namespace App\Models;
 */
class Contest extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

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
