<?php


namespace Core;


class FormValidator
{
    public $errorArray = [];

    public function validate(array $request, array $formRules = [])
    {
        foreach ($request as $formKey => $formValue) {
            $rules = $formRules[$formKey] ?? [];
            foreach ($rules as $rule) {
                $rule = explode(':', $rule);
                $method = $rule[0];
                $arguments = $rule[1] ?? null;

                $validateMethodName = 'validate' . ucfirst($method); // validateRequired


                if (!$this->$validateMethodName($formValue, $arguments)) {
                    $message = config("errors.$method", 'Validation failed');
                    $message = str_replace(
                        ['[FIELD]', '[ARGUMENTS]'],
                        [ucfirst($formKey), $arguments],
                        $message
                    );

                    $this->errorArray [] = $message;
                }
            }
        }
    }

    public function failed(): bool
    {
        return !$this->passed();
    }

    public function passed(): bool
    {
        return empty($this->errorArray);
    }

    public function getErrors()
    {
        if (!$this->passed())
            return $this->errorArray;
    }

    private function validateRequired($value, $argument): bool
    {
        return !empty($value);
    }

    private function validateMin($value, $argument): bool
    {
        return strlen($value) >= (int)$argument;
    }

    private function validateMax($value, $argument): bool
    {
        return strlen($value) <= (int)$argument;
    }

    private function validateAlphanumeric($value, $argument): bool
    {
        return ctype_alnum($value);
    }

    private function validateNumeric($value, $argument): bool
    {
        return preg_match('/^[1-9][0-9]*$/', $value);
//        return ctype_digit($value);
    }

    private function validateAlphabetical($value, $argument): bool
    {
        return ctype_alpha($value);
    }

}