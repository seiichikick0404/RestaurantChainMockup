<?php
namespace Helpers;

use Models\RestaurantChain;

class DrawHelper {

    /**
     * マークダウンで表示
     * 
     * @param restaurantChains<RestaurantChain> $restaurantChains
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
}