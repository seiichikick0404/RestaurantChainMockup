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
        return sprintf("
            <div class='user-card'>
                <h2 class='avatar'>Employees</h2>
                <p>id: %s</p>
                <p>Job Title: %s</p>
                <p>Salary: %s</p>
                <p>Start Date: %s</p>
            </div>",
            $this->id,
            $this->jobTitle,
            number_format($this->salary, 2),
            $this->startDate->format('Y-m-d'),
        );
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }
}