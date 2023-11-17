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

    /**
     * レストランチェーンの情報を文字列で返します。
     *
     * @return string
     */
    public function toString(): string {
        return "[Restaurant Chain]\n" .
            "Name: " . $this->name . "\n" .
            "Cuisine Type: " . $this->cuisineType . "\n" .
            "Number of Locations: " . $this->numberOfLocations . "\n" .
            "Parent Company: " . $this->parentCompany . "\n\n";
    }

    /**
     * レストランチェーンの情報をHTML形式で返します。
     *
     * @return string
     */
    public function toHTML(): string {
        return sprintf(
            "<h2>Restaurant Chain : %s</h2>",
            $this->name
        );
    }

    /**
     * レストランチェーンの情報をマークダウン形式で返します。
     *
     * @return string
     */
    public function toMarkdown(): string {
        return "# Restaurant Chain : " . $this->getName() . "\n" .
            "## Number of locations: " . $this->getNumberOfLocations() . "\n";
    }

    /**
     * レストランチェーンの情報を配列で返します。
     *
     * @return array
     */
    public function toArray(): array {
        return [
            'chainId' => $this->getChainId(),
            'restaurantLocations' => $this->getRestaurantLocations(),
            'cuisineType' => $this->getCuisineType(),
            'numberOfLocations' => $this->getNumberOfLocations(),
            'parentCompany' => $this->getParentCompany(),
        ];
    }

    /**
     * 親会社の名前を返します。
     *
     * @return string
     */
    public function getParentCompany(): string {
        return $this->parentCompany;
    }

    /**
     * レストランの場所のリストを返します。
     *
     * @return array
     */
    public function getRestaurantLocations(): array {
        return $this->restaurantLocations;
    }

    /**
     * レストランチェーンのIDを返します。
     *
     * @return int
     */
    public function getChainId(): int {
        return $this->chainId;
    }

    /**
     * レストランチェーンの料理の種類を返します。
     *
     * @return string
     */
    public function getCuisineType(): string {
        return $this->cuisineType;
    }

    /**
     * レストランチェーンの場所の数を返します。
     *
     * @return int
     */
    public function getNumberOfLocations(): int {
        return $this->numberOfLocations;
    }
}