<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class FinancialProposal.
 *
 * @package namespace App\Models;
 */
class FinancialProposal extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = ['contest_id', 'with_iva', 'without_iva', 'iva_amount'];

    public function contest()
    {
        return $this->hasOne(Contest::class);
    }
}
