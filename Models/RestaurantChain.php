<?php

namespace Models;

use Models\Company;
use Interfaces\FileConvertible;

class RestaurantChain extends Company implements FileConvertible {
    private int $chainId;

    private array $restaurantLocations;

    private string $cuisineType;

    private int $numberOfLocations;

    private string $parentCompany;


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
        int $totalEmployees,
        int $chainId,
        array $restaurantLocations,
        string $cuisineType,
        int $numberOfLocations,
        string $parentCompany,
    ) {
        parent::__construct(
            $name,
            $foundingYear,
            $description,
            $website,
            $phone,
            $industry,
            $ceo,
            $publiclyTraded,
            $country,
            $founder,
            $totalEmployees,
        );

        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }

    public function toString(): string {
        return "[Restaurant Chain]\n" .
               "Name: " . $this->name . "\n" .
               "Cuisine Type: " . $this->cuisineType . "\n" .
               "Number of Locations: " . $this->numberOfLocations . "\n" .
               "Parent Company: " . $this->parentCompany . "\n\n";
    }

    public function toHTML(): string {
        return sprintf(
            "<h2>Restaurant Chain : %s</h2>",
            $this->name
        );
    }

    public function toMarkdown(): string {
        return "# Restaurant Chain : ". $this->getName()."\n# (Number of location : ".$this->numberOfLocations.")\n";
    }

    public function toArray(): array {
        return [
            'chainId' => $this->chainId,
            'restaurantLocations' => $this->restaurantLocations,
            'cuisineType' => $this->cuisineType,
            'numberOfLocations' =>  $this->numberOfLocations,
            'parentCompany' => $this->parentCompany,
        ];
    }

    public function getParentCompany(): string
    {
        return $this->parentCompany;
    }

    public function getRestaurantLocations(): array
    {
        return $this->restaurantLocations;
    }

    public function getChainId(): int
    {
        return $this->chainId;
    }

    public function getCuisineType(): string
    {
        return $this->cuisineType;
    }

    public function getNumberOfLocations(): int
    {
        return $this->numberOfLocations;
    }
}