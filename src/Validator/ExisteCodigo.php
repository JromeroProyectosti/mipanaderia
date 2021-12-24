<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ExisteCodigo extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'El Valor "{{ value }}" no es valido.';

    public function validatedBy()
{
    return static::class.'Validator';
}
}
