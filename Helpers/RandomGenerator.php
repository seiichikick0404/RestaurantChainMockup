<?php

namespace Helpers;

use Faker\Factory;
use Models\User;
use Models\Employee;

class RandomGenerator {
    public static function user(): User {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }

    /**
     * 従業員をランダム生成
     * 
     * @return Employee
     */
    public static function createEmployee(): Employee
    {
        $faker = Factory::create();
        $employee = new Employee(
            $faker->jobTitle,
            $faker->randomFloat(2, 30000, 200000),
            $faker->dateTimeThisDecade,
            $faker->words($faker->numberBetween(1, 5)),
        );

        return $employee;
    }

    /**
     * 従業員を複数人生成する
     */
    public static function createEmployees(int $min, $max): array
    {
        $faker = Factory::create();
        $employees = [];
        $numOfEmployees = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::user();
        }

        return $employees;
    }
}
?>