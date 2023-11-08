<?php

namespace Models;

use Models\FileConvertible;

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
        return "";
    }

    public function toHTML(): string {
        $publiclyTradedString = $this->publiclyTraded ? "Yes" : "No";
        // 最低限のHTMLで会社情報を形成
        return "<div class='company-info'>
                    <strong>$this->name</strong><br>
                    Founded: $this->foundingYear<br>
                    $this->description<br>
                    <a href='$this->website'>$this->website</a><br>
                    Phone: $this->phone<br>
                    Industry: $this->industry<br>
                    CEO: $this->ceo<br>
                    Publicly Traded: $publiclyTradedString
                </div>";
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
}