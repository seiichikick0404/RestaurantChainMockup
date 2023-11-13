<?php

namespace Models;

use Faker\Factory;
use Models\Company;
use Models\FileConvertible;

class RestaurantChain extends Company implements FileConvertible {
    private int $chainId;

    private array $restaurantLocations;

    private string $cuisineType;

    private int $numberOfLocations;

    private Company $parentCompany;


    public function __construct(
        int $chainId,
        array $restaurantLocations,
        string $cuisineType,
        int $numberOfLocations,
        Company $parentCompany,
    ) {
        
        parent::__construct(
            $parentCompany->getName(),
            $parentCompany->getFoundingYear(),
            $parentCompany->getDescription(),
            $parentCompany->getWebsite(),
            $parentCompany->getPhone(),
            $parentCompany->getIndustry(),
            $parentCompany->getCeo(),
            $parentCompany->getPubliclyTraded(),
            $parentCompany->getCountry(),
            $parentCompany->getFounder(),
            $parentCompany->getTotalEmployees(),
        );

        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }

    public function toString(): string {
        return "";
    }

    public function toHTML(): string {
        return sprintf(
            "<h2>Restaurant Chain : %s</h2>",
            $this->parentCompany->getName()
        );
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }

    public function getParentCompany(): Company
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