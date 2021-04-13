<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CompanyValidator.
 *
 * @package namespace App\Validators;
 */
class CompanyValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'  => 'required|min:3|max:30|unique:companies',
            'nuit'  => 'required|min:11|unique:companies',
            'phone' => 'required|min:12|unique:companies',
            'email' => 'required|email|unique:companies',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
