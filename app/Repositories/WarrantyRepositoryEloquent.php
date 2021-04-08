<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WarrantyRepository;
use App\Models\Warranty;
use App\Validators\WarrantyValidator;

/**
 * Class WarrantyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WarrantyRepositoryEloquent extends BaseRepository implements WarrantyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Warranty::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WarrantyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
