<?php

namespace Models;

use Faker\Extension\FileExtension;
use Models\Employee;
use Models\FileConvertible;

class RestaurantLocation implements FileConvertible {

    private string $name;

    private string $address;

    private string $city;

    private string $state;

    private string $zipCode;

    /** @var Employee[] */
    private array $employees;

    private bool $isOpen = false;

    private bool $hasDriveThru = false;

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
        return ("");
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }
}