<?php

namespace Models;

use DateTime;
use Models\User;
use Interfaces\FileConvertible;


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

    /**
     * 従業員情報を文字列で返す
     *
     * @return string 従業員情報の文字列
     */
    public function toString(): string {
        return "    [Employees]\n" .
            "    Name: " . $this->getFullName() . "\n" .
            "    Job Title: " . $this->jobTitle . "\n" .
            "    Start Date: " . $this->startDate->format('Y-m-d') . "\n" .
            "    Salary: " . $this->salary . "\n\n";
    }

    /**
     * 従業員情報をHTML形式で返す
     *
     * @return string 従業員情報のHTML
     */
    public function toHTML(): string {
        return sprintf(
            "<p>ID: %d, Job Title: %s, Name: %s, Start Date: %s, Salary: $%s</p>",
            parent::getID(),
            $this->jobTitle,
            parent::getFullName(),
            $this->startDate->format('Y-m-d'),
            number_format($this->salary, 2, '.', ',')
        );
    }

    /**
     * 従業員情報をマークダウン形式で返す
     *
     * @return string 従業員情報のマークダウン
     */
    public function toMarkdown(): string {
        return "- ID: ".parent::getID().", Job Title: ".$this->jobTitle.", Name: ".parent::getFullName().", Start Date: ".$this->startDate->format('Y-m-d').",  Salary: $".$this->salary."\n";
    }

    /**
     * 従業員情報を配列で返す
     *
     * @return array 従業員情報の配列
     */
    public function toArray(): array {
        return [
            'id' => parent::getId(),
            'jobTitle' => $this->jobTitle,
            'fullName' => $this->getFullName(),
            'startDate' => $this->startDate->format('Y-m-d'),
            'salary' => $this->salary
        ];
    }

    /**
     * 職種を取得
     *
     * @return string
     */
    public function getJobTitle(): string {
        return $this->jobTitle;
    }

    /**
     * 給与を取得
     *
     * @return float
     */
    public function getSalary(): float {
        return $this->salary;
    }

    /**
     * 開始日を取得
     *
     * @return DateTime
     */
    public function getStartDate(): DateTime {
        return $this->startDate;
    }

    /**
     * 受賞歴を取得
     *
     * @return array
     */
    public function getAwards(): array {
        return $this->awards;
    }

}