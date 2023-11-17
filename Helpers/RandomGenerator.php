<?php

namespace Helpers;

use Faker\Factory;
use Models\Employee;
use Models\RestaurantChain;
use Models\RestaurantLocation;

class RandomGenerator {
    const MIN_RESTAURANT_CHAIN = 3;
    const MAX_RESTAURANT_CHAIN = 5;
    const MIN_EMPLOYEE = 2;
    const MAX_EMPLOYEE = 5;
    const MIN_RESTAURANT_LOCATION = 2;
    const MAX_RESTAURANT_LOCATION = 5;


    /**
     * 従業員をランダム生成
     *
     * @param int $salaryRange
     * @return Employee
     */
    public static function createEmployee(int $salaryRange): Employee
    {
        // salaryRangeの指定
        $salaryRangeMin = $salaryRange;
        $salaryRangeMax = $salaryRange + 19999;

        $faker = Factory::create();
        $employee = new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->jobTitle,
            $faker->randomFloat(2, $salaryRangeMin, $salaryRangeMax),
            $faker->dateTimeThisDecade,
            $faker->words($faker->numberBetween(1, 5)),
        );

        return $employee;
    }

    /**
     * 従業員を複数人生成する
     *
     * @param int $employeeCount
     * @param int $salaryRange
     * @return array
     */
    public static function createEmployees(int $employeeCount, int $salaryRange): array
    {
        $employees = [];

        for ($i = 0; $i < $employeeCount; $i++) {
            $employees[] = self::createEmployee($salaryRange);
        }

        return $employees;
    }

    /**
     * 指定された範囲内で郵便番号を生成する
     *
     * @param string $postalCodeMin
     * @param string $postalCodeMax
     * @return string 生成された郵便番号
     */
    private static function generateZipCodeInRange(string $postalCodeMin, string $postalCodeMax): string {
        $faker = Factory::create();

        $zipPrefixMin = substr($postalCodeMin, 0, 3);
        $zipPrefixMax = substr($postalCodeMax, 0, 3);
        $zipSuffixMin = substr($postalCodeMin, 4, 4);
        $zipSuffixMax = substr($postalCodeMax, 4, 4);

        $zipPrefix = $faker->numberBetween($zipPrefixMin, $zipPrefixMax);
        $zipSuffix = $faker->numberBetween($zipSuffixMin, $zipSuffixMax);

        return str_pad($zipPrefix, 3, "0", STR_PAD_LEFT) . '-' .
               str_pad($zipSuffix, 4, "0", STR_PAD_LEFT);
    }

    /**
     * レストランロケーションの生成
     *
     * @param int $employeeCount
     * @param int $salaryRange
     * @param string $postalCodeMin
     * @param string $postalCodeMax
     * @return RestaurantLocation
     */
    public static function createRestaurantLocation(
        int $employeeCount,
        int $salaryRange,
        string $postalCodeMin,
        string $postalCodeMax
    ): RestaurantLocation {
        $faker = Factory::create();

        $name = $faker->company;
        $address = $faker->streetAddress;
        $city = $faker->city;
        $state = $faker->state;
        $zipCode = self::generateZipCodeInRange($postalCodeMin, $postalCodeMax);

        $employees = self::createEmployees($employeeCount, $salaryRange);
        $isOpen = $faker->boolean;
        $hasDriveThru = $faker->boolean;

        return new RestaurantLocation(
            $name,
            $address,
            $city,
            $state,
            $zipCode,
            $employees,
            $isOpen,
            $hasDriveThru
        );
    }

    /**
     * 複数のレストランのロケーションを生成
     *
     * @param int $employeeCount
     * @param int $salaryRange
     * @param int $locationCount
     * @param string $postalCodeMin
     * @param string $postalCodeMax
     * @return array[RestaurantLocation]
     */
    public static function createRestaurantLocations(
        int $employeeCount,
        int $salaryRange,
        int $locationCount,
        string $postalCodeMin,
        string $postalCodeMax
    ): array
    {
        $restaurantLocations = [];

        for ($i = 0; $i < $locationCount; $i++) {
            $restaurantLocations[] = self::createRestaurantLocation(
                $employeeCount,
                $salaryRange,
                $postalCodeMin,
                $postalCodeMax
            );
        }

        return $restaurantLocations;
    }

    /**
     * レストランチェーンを生成
     *
     * @param int $employeeCount
     * @param int $salaryRange
     * @param int $locationCount
     * @param string $postalCodeMin
     * @param string $postalCodeMax
     * @return RestaurantChain
     */
    public static function createRestaurantChain(
        int $employeeCount,
        int $salaryRange,
        int $locationCount,
        string $postalCodeMin,
        string $postalCodeMax
    ): RestaurantChain
    {
        $faker = Factory::create();

        // Companyの情報を生成
        $name = $faker->company;
        $foundingYear = $faker->numberBetween(1800, 2020);
        $description = $faker->catchPhrase;
        $website = $faker->domainName;
        $phone = $faker->phoneNumber;
        $industry = $faker->word;
        $ceo = $faker->name;
        $publiclyTraded = $faker->boolean;
        $country = $faker->country;
        $founder = $faker->name;
        $totalEmployees = $employeeCount;


        // RestaurantChainの情報を生成
        $chainId = $faker->randomNumber();
        $cuisineType = $faker->randomElement(['Japanese', 'Italian', 'American', 'Mexican', 'Chinese']);
        $restaurantLocations = self::createRestaurantLocations(
            $employeeCount,
            $salaryRange,
            $locationCount,
            $postalCodeMin,
            $postalCodeMax
        );
        $numberOfLocations = $locationCount;
        $parentCompany = "";

        $restaurantChain = new RestaurantChain(
            $name,
            $foundingYear,
            $description,
            $website,
            $phone,
            $industry,
            $ceo,
            $publiclyTraded,
            $country,
            $founder,
            $totalEmployees,
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
     * @param int $employeeCount
     * @param int $salaryRange
     * @param int $locationCount
     * @param string $postalCodeMin
     * @param string $postalCodeMax
     * @return array[RestaurantChain] $restaurantChains
     */
    public static function createRestaurantChains(
        int $min,
        int $max,
        int $employeeCount,
        int $salaryRange,
        int $locationCount,
        string $postalCodeMin,
        string $postalCodeMax
    ): array
    {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfRestaurantChains = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantChains; $i++) {
            $restaurantChains[] = self::createRestaurantChain(
                $employeeCount,
                $salaryRange,
                $locationCount,
                $postalCodeMin,
                $postalCodeMax
            );
        }

        return $restaurantChains;
    }
}

