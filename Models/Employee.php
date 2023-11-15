<?php

namespace Models;

use DateTime;
use Models\User;
use Interfaces\FileConvertible;
use Faker\Factory;



class Employee extends User implements FileConvertible {

    private string $jobTitle;

    private float $salary;

    private DateTime $startDate;

    private array $awards;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $email,
        string $hashedPassword,
        string $phoneNumber,
        string $address,
        DateTime $birthDate,
        DateTime $membershipExpirationDate,
        string $role,
        string $jobTitle,
        float $salary,
        DateTime $startDate,
        array $awards,
    ) {
        // 親クラスのコンストラクタを呼び出す
        parent::__construct(
            $id,
            $firstName,
            $lastName,
            $email,
            $hashedPassword,
            $phoneNumber,
            $address,
            $birthDate,
            $membershipExpirationDate,
            $role,
        );

        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function toString(): string {
        return "";
    }

    public function toHTML(): string {
        return sprintf(
            "<p>ID: %d, Job Title: %s, Name: %s, Start Date: %s</p>",
            parent::getID(),
            $this->jobTitle,
            parent::getFullName(),
            $this->startDate->format('Y-m-d'),
        );
    }

    public function toMarkdown(): string {
        return "";
    }

    public function toArray(): array {
        return [];
    }

    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getAwards(): array
    {
        return $this->awards;
    }

    
}