<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

use Helpers\RandomGenerator;
use Faker\Factory;

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 1;
$max = $_GET['max'] ?? 3;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// 会社とそのチェーン店配列を取得
$companiesRestaurantChains = RandomGenerator::createCompaniesRestaurantChains($min, $max);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Restaurant Chains</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
    <?php
        foreach ($companiesRestaurantChains as [$company, $restaurantChains]) {
            // レストランチェーンの名前を表示
            echo "<h2 class='mb-3 text-center'>" . "Restaurant Chain " . $company->getName() . "</h2>";
            // 会社情報を表示
            echo $company->toHTML();
            
            // 各レストランチェーンの情報を表示
            foreach ($restaurantChains as $chain) {
                // レストランチェーン情報を表示
                echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header bg-primary text-white'>" . "Restaurant Information" . "</div>";
                echo "<div class='card-body'>";
                
                // 各レストランの場所と、そこに関連する従業員情報を表示
                foreach ($chain->getRestaurantLocations() as $location) {
                    echo $location->toHTML(); // レストランの場所情報を表示
                    
                    // その場所に関連する従業員情報を表示
                    echo "<div class='employees-info'>";
                    foreach ($location->getEmployees() as $employee) {
                        echo $employee->toHTML(); // 従業員情報を表示
                    }
                    echo "</div>"; // employees-info
                }
                
                echo "</div>"; // card-body
                echo "</div>"; // card
            }
        }
        ?>

    </div>
</body>
</html>
