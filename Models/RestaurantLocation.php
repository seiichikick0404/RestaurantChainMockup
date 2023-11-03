<?php

namespace Models;

use Faker\Extension\FileExtension;
use Models\Employee;
use Models\FileConvertible;

class RestaurantLocation implements FileConvertible {

    private string $name;

    private string $address;

    private string $string;

    private string $state;

    private string $zipCode;

    /** @var Employee[] */
    private array $employees;

    private bool $isOpen = false;

    private bool $hasDriveThru = false;

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