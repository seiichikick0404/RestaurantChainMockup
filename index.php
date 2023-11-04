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

var_dump($companiesRestaurantChains[0][1]);
exit;







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
        
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Glover-Rice</div>
            <div class="card-body">
                <p class="font-weight-bold">Company Information:</p>
                <p>Company Name: <span class="text-muted">Glover-Rice</span><br>
                   Address: <span class="text-muted">9060 Kling Unions Apt. 659, Steidermannborough, Idaho ZipCode: 03603</span></p>
                <h5>Employees:</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID: 9, Job Title: cashier, <span class="font-weight-bold">Lyric Predovic</span>, Start Date: 2019-09-01</li>
                    <li class="list-group-item">ID: 230295964, Job Title: chef, <span class="font-weight-bold">Constance Jaskolski</span>, Start Date: 2020-04-25</li>
                    <li class="list-group-item">ID: 2514, Job Title: cashier, <span class="font-weight-bold">Joaquin McKenzie</span>, Start Date: 2023-03-24</li>
                </ul>
            </div>
        </div>

        <!-- 他のレストランチェーン情報も同様にカードを追加してください -->

    </div>


    <h1>User Profiles Test</h1>

    <?php foreach ($employees as $employee): ?>
    <?= $employee->toHTML(); ?>
    <?php endforeach; ?>

</body>
</html>