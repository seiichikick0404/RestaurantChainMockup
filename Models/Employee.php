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
        // 最低限のHTMLで従業員情報を形成
        return "<div class='employee-info'>
                    Job Title: $this->jobTitle<br>
                    Salary: $this->salary<br>
                    Start Date: " . $this->startDate->format('Y-m-d') . "<br>
                    Awards: " . implode(', ', $this->awards) . "
                </div>";
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }
}