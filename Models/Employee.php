<?php

namespace Models;

use DateTime;
use Models\User;
use Models\FileConvertible;
use Faker\Factory;



class Employee extends User implements FileConvertible {

    private string $jobTitle;

    private float $salary;

    private DateTime $startDate;

    private array $awards;

    public function __construct(
        string $jobTitle,
        float $salary,
        DateTime $startDate,
        array $awards,
    ) {
        $faker = Factory::create();

        // 親クラスのコンストラクタを呼び出す
        parent::__construct();

        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function toString(): string {
        return "";
    }

    public function toHTML(): string {
        return "<li class='list-group-item'>
            ID: $this->id, Job Title: $this->jobTitle, $this->firstName . $this->lastName, Start Date: " . $this->startDate->format('Y-m-d') . "
        </li>";
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }

    
}