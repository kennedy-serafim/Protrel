<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SupplierValidator.
 *
 * @package namespace App\Validators;
 */
class SupplierValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'      => 'required|unique:suppliers|max:30',
            'phone'     => 'required|min:12|unique:suppliers',
            'email'     => 'required|email|unique:suppliers',
            'tags'      => 'required|array|min:2|distinct',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];

    protected $messages = [
        'phone.min'         => 'O Telefone deve ter pelo menos 9 caracteres',
        'tags.required'     => 'O tipo de produto é obrigatório',
        'tags.min'          => 'Digite pelo menos :min tipos de produtos',
    ];
}
