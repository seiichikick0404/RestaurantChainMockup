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


    public function __construct(
        string $name,
        int $foundingYear,
        string $description,
        string $website,
        string $phone,
        string $industry,
        string $ceo,
        bool $publiclyTraded,
        string $country,
        string $founder,
        int $totalEmployees
    ) {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->publiclyTraded = $publiclyTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
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