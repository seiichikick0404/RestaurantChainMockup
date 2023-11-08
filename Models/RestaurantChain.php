<?php

namespace Models;

use Models\Company;
use Models\FileConvertible;

class RestaurantChain extends Company implements FileConvertible {
    private int $chainId;

    private array $restaurantLocations;

    private string $cuisineType;

    private int $numberOfLocations;

    private string $parentCompany;

    public function __construct(
        int $chainId,
        array $restaurantLocations,
        string $cuisineType,
        int $numberOfLocations,
        string $parentCompany,
    ) {
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
        // Company から継承された情報を含め、レストランチェーン情報を形成
        $html = parent::toHTML(); // Company クラスの toHTML メソッドを利用
        foreach ($this->restaurantLocations as $location) {
            $html .= $location->toHTML();
        }
        return $html;
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }

    public function getParentCompany(): string
    {
        return $this->parentCompany;
    }

    public function getRestaurantLocations(): array
    {
        return $this->restaurantLocations;
    }
}