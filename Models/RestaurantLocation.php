<?php

namespace Models;

use Models\Employee;

class RestaurantLocation {

    private string $name;

    private string $address;

    private string $string;

    private string $state;

    private string $zipCode;

    /** @var Employee[] */
    private array $employees;

    private bool $isOpen = false;

    private bool $hasDriveThru = false;
}