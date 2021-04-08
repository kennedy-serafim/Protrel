<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'username'      =>  ['required', 'min:8', 'unique:users'],
            'email'         =>  ['required', 'min:8', 'unique:users'],
            'password'      =>  ['required', 'min:8',],
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
