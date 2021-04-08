<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Company.
 *
 * @package namespace App\Models;
 */
class Company extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = ['name', 'nuit', 'phone', 'email', 'manager', 'address'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function contests()
    {
        return $this->hasMany(Contest::class);
    }
}
