<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'product_tag_suppliers');
    }
}
