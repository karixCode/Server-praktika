<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class MaxValidator extends AbstractValidator
{
    protected string $message = 'Поле :field должно быть не длиннее :min_length символов';

    public function rule(): bool
    {
        return strlen($this->value) <= $this->args['max_length'];
    }
}