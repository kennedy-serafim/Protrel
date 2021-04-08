<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Insurance.
 *
 * @package namespace App\Models;
 */
class Insurance extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = ['name', 'phone', 'email', 'address', 'link'];

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }
}
