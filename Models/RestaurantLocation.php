<?php

namespace Models;

use Faker\Extension\FileExtension;
use Models\Employee;
use Models\FileConvertible;

class RestaurantLocation implements FileConvertible {

    public string $name;

    public string $address;

    public string $city;

    public string $state;

    public string $zipCode;

    /** @var Employee[] */
    public array $employees;

    public bool $isOpen = false;

    public bool $hasDriveThru = false;

    public function __construct(
        string $name,
        string $address,
        string $city,
        string $state,
        string $zipCode,
        array $employees,
        bool $isOpen,
        bool $hasDriveThru,
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    public function toString(): string {
        return "";
    }

    public function toHTML(): string {
        return sprintf(
            '<p>Company Name: %s, Address: %s, Zip Code: %s</p>',
            $this->name,
            $this->address,
            $this->zipCode,
        );
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    
}