<?php
namespace Helpers;

use Models\RestaurantChain;

class DrawHelper {

    /**
     * マークダウンで表示
     *
     * @param array<RestaurantChain> $restaurantChains
     * @return void
     */
    public static function drawMarkdown(array $restaurantChains): void
    {
        foreach ($restaurantChains as $restaurantChain) {
            echo $restaurantChain->toMarkdown();

            foreach ($restaurantChain->getRestaurantLocations() as $restaurantLocation) {
                echo $restaurantLocation->toMarkdown();

                foreach ($restaurantLocation->getEmployees() as $employee) {
                    echo $employee->toMarkdown();
                }
            }
        }
    }

    /**
     * JSONで表示
     *
     * @param array<RestaurantChain> $restaurantChains
     * @return void
     */
    public static function drawJson(array $restaurantChains): void
    {
        $data = [];
        foreach ($restaurantChains as $index => $restaurantChain) {
            $chainData = [
                'restaurantChain' => $restaurantChain->getName(),
                'numberOfLocation' => $restaurantChain->getNumberOfLocations(),
                'restaurantLocations' => []
            ];

            foreach ($restaurantChain->getRestaurantLocations() as $location) {
                $locationData = [
                    'name' => ['name' => $location->getName()],
                    'detail' => [
                        'name' => $location->getName(),
                        'address' => $location->getAddress(),
                        'zipCode' => $location->getZipCode()
                    ],
                    'employees' => []
                ];

                foreach ($location->getEmployees() as $employee) {
                    $employeeData = [
                        'id' => $employee->getId(),
                        'jobTitle' => $employee->getJobTitle(),
                        'name' => $employee->getFullName(),
                        'startDate' => $employee->getStartDate()->format('Y-m-d'),
                        'salary' => $employee->getSalary()
                    ];
                    $locationData['employees'][] = $employeeData;
                }

                $chainData['restaurantLocations'][] = $locationData;
            }

            $data["restaurantChains" . ($index + 1)] = $chainData;
        }

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * テキスト形式で出力
     *
     * @param array<RestaurantChain> $restaurantChains
     * @return void
     */
    public static function drawText(array $restaurantChains): void
    {
        foreach ($restaurantChains as $restaurantChain) {
            echo $restaurantChain->toString();

            foreach ($restaurantChain->getRestaurantLocations() as $restaurantLocation) {
                echo $restaurantLocation->toString();

                foreach ($restaurantLocation->getEmployees() as $employee) {
                    echo $employee->toString();
                }
            }
        }
    }
}