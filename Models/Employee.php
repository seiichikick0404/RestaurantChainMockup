<?php

namespace Models;

use DateTime;
use Models\User;
use Models\FileConvertible;



class Employee extends User implements FileConvertible {

    private string $jobTitle;

    private float $salary;

    private DateTime $statDate;

    private array $awards;

    public function __construct(
        string $jobTitle,
        float $salary,
        DateTime $statDate,
        array $awards,
    ) {
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
    }

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