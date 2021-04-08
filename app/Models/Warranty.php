<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Warranty.
 *
 * @package namespace App\Models;
 */
class Warranty extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

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
