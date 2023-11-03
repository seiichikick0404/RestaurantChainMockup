<?php

namespace Models;

use Models\FileConvertible;

class Company implements FileConvertible {

    private string $name;

    private int $foundingYear;

    private string $description;

    private string $website;

    private string $phone;

    private string $industry;

    private string $ceo;

    private bool $publiclyTraded;

    private string $country;

    private string $founder;

    private int $totalEmployees;

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