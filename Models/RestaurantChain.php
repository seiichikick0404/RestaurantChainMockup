<?php

namespace Models;

use Models\Company;
use Models\FileConvertible;

class RestaurantChain extends Company implements FileConvertible {
    private int $chainId;

    private array $restaurantLocation;

    private string $cuisineType;

    private int $numberOfLocations;

    private string $parentCompany;

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