<?php

namespace App\Contracts;

interface PhoneValidationServiceInterface
{
    /**
     * Validate phone number using third party API
     *
     * @param string $phone
     * @return bool
     */
    public function validate(string $phone): bool;
}
