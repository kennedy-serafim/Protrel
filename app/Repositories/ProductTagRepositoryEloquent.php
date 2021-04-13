<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductTagRepository;
use App\Models\ProductTag;
use App\Validators\ProductTagValidator;

/**
 * Class ProductTagRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductTagRepositoryEloquent extends BaseRepository implements ProductTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductTag::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductTagValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
