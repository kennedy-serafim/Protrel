<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Supplier.
 *
 * @package namespace App\Models;
 */
class Supplier extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = ['name', 'phone', 'email', 'address', 'link'];

    public function productTags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_tag_suppliers');
    }
}
