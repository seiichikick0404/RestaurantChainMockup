<?php

namespace Models;

use Faker\Factory;
use Models\FileConvertible;

class Company implements FileConvertible {

    public string $name;

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
        return "";
    }

    public function toHTML(): string {
        return sprintf(
            "<h2>Restaurant Chain : %s</h2>",
            $this->name
        );
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
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

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setFoundingYear(int $foundingYear): void {
        $this->foundingYear = $foundingYear;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setWebsite(string $website): void {
        $this->website = $website;
    }

    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    public function setIndustry(string $industry): void {
        $this->industry = $industry;
    }

    public function setCeo(string $ceo): void {
        $this->ceo = $ceo;
    }

    public function setPubliclyTraded(bool $publiclyTraded): void {
        $this->publiclyTraded = $publiclyTraded;
    }

    public function setCountry(string $country): void {
        $this->country = $country;
    }

    public function setFounder(string $founder): void {
        $this->founder = $founder;
    }

    public function setTotalEmployees(int $totalEmployees): void {
        $this->totalEmployees = $totalEmployees;
    }
}