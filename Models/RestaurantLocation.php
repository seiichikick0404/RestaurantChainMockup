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
        $isOpenString = $this->isOpen ? "Open" : "Closed";
        return "<div class='location-info'>
                    <strong>$this->name</strong><br>
                    Address: $this->address, $this->city, $this->state, $this->zipCode<br>
                    Status: $isOpenString
                </div>";
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }
}