<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

use Helpers\RandomGenerator;

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

// var_dump($companiesRestaurantChains[0][1]);
// exit;

// 取得内容をフロントに出力



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>User Profiles</title>
    <style>
        /* ユーザーカードのスタイル */
    </style>
</head>
<body>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-3 text-center">Restaurant Chain Rogahn, Ortiz and Stark</h2>

        <?php
        foreach ($companiesRestaurantChains as [$company, $restaurantChains]) {
            // ...[前のコード]...

            foreach ($restaurantChains as $chain) {
                echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header bg-primary text-white'>" . "ここは空欄" . "</div>";
                echo "<div class='card-body'>";
                
                // 会社情報と関連するレストランの場所を表示
                echo $company->toHTML();

                foreach ($chain->getRestaurantLocations() as $location) {
                    // ロケーションごとの従業員情報を表示
                    echo "<ul class='list-group list-group-flush'>";
                    foreach ($location->getEmployees() as $employee) {
                        echo "<li class='list-group-item'>";
                        echo "ID: " . "testid1111" . ", Job Title: " . "test job title" . ", ";
                        echo "<span class='font-weight-bold'>" . "getNameを表示" . "</span>, ";
                        echo "Start Date: " . "test start Date";
                        echo "</li>";
                    }
                    echo "</ul>";
                }
                echo "</div>"; // card-body
                echo "</div>"; // card
            }
        }
        ?>
        
    </div>    

</body>
</html>