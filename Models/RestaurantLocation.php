<?php

namespace Models;

use Models\Employee;
use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible {

    public string $name;

    public string $address;

    public string $city;

    public string $state;

    public string $zipCode;

    /** @var Employee[] */
    public array $employees;

    public bool $isOpen = false;

    public bool $hasDriveThru = false;

    public function __construct(
        string $name,
        string $address,
        string $city,
        string $state,
        string $zipCode,
        array $employees,
        bool $isOpen,
        bool $hasDriveThru,
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    /**
     * レストランのロケーション情報を文字列で返す
     *
     * @return string
     */
    public function toString(): string {
        return "  [Locations]\n" .
            "  Name: " . $this->name . "\n" .
            "  Address: " . $this->address . "\n" .
            "  Zip Code: " . $this->zipCode . "\n\n";
    }

    /**
     * レストランのロケーション情報をHTML形式で返す
     *
     * @return string
     */
    public function toHTML(): string {
        return sprintf(
            "\t・Company Name: %s, Address: %s, Zip Code: %s\n\n",
            $this->name,
            $this->address,
            $this->zipCode
        );
    }

    /**
     * レストランのロケーション情報をマークダウン形式で返す
     *
     * @return string
     */
    public function toMarkdown(): string {
        return "- Company Name: " . $this->name . ", Address: " . $this->address . ", Zip Code: " . $this->zipCode . "\n";
    }

    /**
     * レストランのロケーション情報を配列で返す
     *
     * @return array
     */
    public function toArray(): array {
        return [
            'companyName' => $this->name,
            'Address' => $this->address,
            'zipCode' => $this->zipCode
        ];
    }

    /**
     * レストランの名前を取得
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * レストランの住所を取得
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * レストランの所在都市を取得
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * レストランの所在州を取得
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * レストランの郵便番号を取得
     *
     * @return string
     */
    public function getZipCode(): string {
        return $this->zipCode;
    }

    /**
     * レストランの従業員リストを取得
     *
     * @return array
     */
    public function getEmployees(): array {
        return $this->employees;
    }
}