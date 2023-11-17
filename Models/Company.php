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


    /**
     * stringで出力
     *
     * @return string
     */
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

    /**
     * HTMLで出力
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
     * マークダウンで出力
     *
     * @return string
     */
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

    /**
     * 配列を返す
     *
     * @return array
     */
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
     * 会社の名前を取得します。
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 会社の設立年を取得します。
     *
     * @return int
     */
    public function getFoundingYear(): int
    {
        return $this->foundingYear;
    }

    /**
     * 会社の説明を取得します。
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * 会社のウェブサイトURLを取得します。
     *
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * 会社の電話番号を取得します。
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * 会社の業界タイプを取得します。
     *
     * @return string
     */
    public function getIndustry(): string
    {
        return $this->industry;
    }

    /**
     * 会社のCEOの名前を取得します。
     *
     * @return string
     */
    public function getCeo(): string
    {
        return $this->ceo;
    }

    /**
     * 会社が公開企業かどうかを確認します。
     *
     * @return bool
     */
    public function getPubliclyTraded(): bool
    {
        return $this->publiclyTraded;
    }

    /**
     * 会社が位置する国を取得します。
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * 会社の創業者の名前を取得します。
     *
     * @return string
     */
    public function getFounder(): string
    {
        return $this->founder;
    }

    /**
     * 会社の従業員の総数を取得します。
     *
     * @return int
     */
    public function getTotalEmployees(): int
    {
        return $this->totalEmployees;
    }
}