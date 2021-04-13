<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FinancialProposalRepository;
use App\Models\FinancialProposal;
use App\Validators\FinancialProposalValidator;

/**
 * Class FinancialProposalRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FinancialProposalRepositoryEloquent extends BaseRepository implements FinancialProposalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FinancialProposal::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FinancialProposalValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
