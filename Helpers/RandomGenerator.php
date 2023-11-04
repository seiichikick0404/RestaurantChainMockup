<?php

namespace Helpers;

use Faker\Factory;
use Models\User;
use Models\Employee;
use Models\RestaurantChain;
use Models\RestaurantLocation;
use Models\Company;

class RandomGenerator {

    
    const MIN_RESTAURANT_CHAIN = 3;
    const MAX_RESTAURANT_CHAIN = 5;
    const MIN_EMPLOYEE = 2;
    const MAX_EMPLOYEE = 5;
    const MIN_RESTAURANT_LOCATION = 2;
    const MAX_RESTAURANT_LOCATION = 5;



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
        $employees = self::createEmployees(self::MIN_EMPLOYEE, self::MAX_EMPLOYEE);
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
        $cuisineType = $faker->randomElement(['Japanese', 'Italian', 'American', 'Mexican', 'Chinese']);
        $restaurantLocations = self::createRestaurantLocations(self::MIN_RESTAURANT_LOCATION, self::MAX_RESTAURANT_LOCATION);
        $numberOfLocations = count($restaurantLocations);

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
    public static function createCompany(): Company
    {
        $faker = Factory::create();

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
        $totalEmployees = $faker->numberBetween(50, 10000);

        return new Company(
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
            $totalEmployees
        );
    }

    /**
     * 親会社を複数生成するのと同時に紐づくチェーンの配列を返す
     * 
     * @param int $min
     * @param int $max
     * @return array[Company, [RestaurantChain]]
     */
    public static function createCompaniesRestaurantChains($min, $max): array
    {
        $faker = Factory::create();
        $numOfCompanies = $faker->numberBetween($min, $max);

        $companyRestaurantChains = [];
        for ($i= 0; $i < $numOfCompanies; $i++) {
            $company = self::createCompany();
            $companyRestaurantChains[] =  [
                $company,
                self::createRestaurantChains(self::MIN_RESTAURANT_CHAIN, self::MAX_RESTAURANT_CHAIN, $company->getName())
            ];
        }

        return $companyRestaurantChains;
    }
}
?>