<?php

namespace Helpers;

use Faker\Factory;
use Models\User;
use Models\Employee;
use Models\RestaurantChain;
use Models\RestaurantLocation;
use Models\Company;

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

    /**
     * レストランロケーションの生成
     * 
     * @return RestaurantLocation
     */
    public static function createRestaurantLocation(): RestaurantLocation
    {
        $faker = Factory::create();

        // ランダムな値でレストランの詳細を生成
        $name = $faker->company;
        $address = $faker->streetAddress;
        $city = $faker->city;
        $state = $faker->state;
        $zipCode = $faker->postcode;

        // 従業員の配列を生成
        $employees = self::createEmployees(1, 5);
        $isOpen = $faker->boolean;
        $hasDriveThru = $faker->boolean;

        // RestaurantLocationオブジェクトの生成
        $restaurantLocation = new RestaurantLocation(
            $name,
            $address,
            $city,
            $state,
            $zipCode,
            $employees,
            $isOpen,
            $hasDriveThru
        );

        return $restaurantLocation;
    }

    /**
     * 複数のレストランのロケーションを生成
     * 
     * @param int $min
     * @param int $max
     * @return array[RestaurantLocation]
     */
    public static function createRestaurantLocations($min, $max): array
    {
        $faker = Factory::create();
        $restaurantLocations = [];
        $numOfRestaurantLocations = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantLocations; $i++) {
            $restaurantLocations[] = self::createRestaurantLocation();
        }

        return $restaurantLocations;
    }


    /**
     * レストランチェーンを生成
     * 
     * @param string $parentCompanyName
     * @return RestaurantChain
     */
    public static function createRestaurantChain(string $parentCompanyName): RestaurantChain
    {
        $faker = Factory::create();

        $chainId = $faker->randomNumber();
        $parentCompany = $parentCompanyName;
        $cuisineType = $faker->randomElement(['Japanese', 'Italian', 'American', 'Mexican', 'Chinese']); // 例
        $numberOfLocations = $faker->numberBetween(1, 5);

        $restaurantLocations = self::createRestaurantLocations(1, 5);

        $restaurantChain = new RestaurantChain(
            $chainId,
            $restaurantLocations,
            $cuisineType,
            $numberOfLocations,
            $parentCompany
        );

        return $restaurantChain;
    }


    /**
     * レストランチェーンを複数生成する
     * 
     * @param int $min
     * @param int $max
     * @return array[RestaurantChain] $restaurantChains
     */
    public static function createRestaurantChains(int $min, int $max, string $parentCompanyName): array
    {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfRestaurantChains = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantChains; $i++) {
            $restaurantChains[] = self::createRestaurantChain($parentCompanyName);
        }

        return $restaurantChains;
    }

    /**
     * 親会社の生成
     * 
     * @param Company
     */
    // public static function createCompany(): Company
    // {
    //     $faker = Factory::create();
        
    // }
}
?>