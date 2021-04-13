<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductTag.
 *
 * @package namespace App\Models;
 */
class ProductTag extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = ['name'];

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'product_tag_suppliers');
    }
}
