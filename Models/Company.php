<?php

namespace Models;

use Interfaces\FileConvertible;

class Company implements FileConvertible {

    protected string $name;

    protected int $foundingYear;

    protected string $description;

    protected string $website;

    protected string $phone;

    protected string $industry;

    protected string $ceo;

    protected bool $publiclyTraded;

    protected string $country;

    protected string $founder;

    protected int $totalEmployees;


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
        return sprintf(
            "Name: %s\nFounding Year: %d\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\nCEO: %s\nPublicly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %d",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->publiclyTraded ? 'Yes' : 'No',
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }


    public function toHTML(): string {
        return sprintf(
            "<h2>Restaurant Chain : %s</h2>",
            $this->name
        );
    }

    public function toMarkdown(): string {
        return " - name: {$this->name}
                 - foundingYear: {$this->foundingYear}
                 - description: {$this->description}
                 - website: {$this->website}
                 - phone: {$this->phone}
                 - industry: ($this->industry)
                 - ceo: {$this->ceo}
                 - publiclyTraded: {$this->publiclyTraded}
                 - country: {$this->country}
                 - founder: {$this->founder}
                 - totalEmployees: {$this->totalEmployees}";
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'foundingYear' => $this->foundingYear,
            'description' => $this->description,
            'website' => $this->website,
            'phone' => $this->phone,
            'industry' => $this->industry,
            'ceo' => $this->ceo,
            'publiclyTraded' => $this->publiclyTraded,
            'country' => $this->country,
            'founder' => $this->founder,
            'totalEmployees' => $this->totalEmployees
        ];
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getFoundingYear(): int
    {
        return $this->foundingYear;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getIndustry(): string
    {
        return $this->industry;
    }

    public function getCeo(): string
    {
        return $this->ceo;
    }

    public function getPubliclyTraded(): bool
    {
        return $this->publiclyTraded;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getFounder(): string
    {
        return $this->founder;
    }

    public function getTotalEmployees(): int
    {
        return $this->totalEmployees;
    }
}