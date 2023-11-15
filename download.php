<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;
use Faker\Factory;


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST通信以外受け付けません");
}

// クエリ文字列からパラメータを取得
$min = $_GET["min"] ?? 2;
$max = $_GET["max"] ?? 5;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// POSTリクエストからパラメータを取得
$employeeCount = (int)$_POST['employeeCount'] ?? 3;
$salaryRange = (int)$_POST['salaryRange'] ?? 30000;
$locationCount = (int)$_POST['locationCount'] ?? 3;
$postalCodeMin = $_POST['postalCodeMin'] ?? "000-0000";
$postalCodeMax = $_POST['postalCodeMax'] ?? "999-9999";
$fileType = $_POST['fileType'] ?? "html";


// var_dump($employeeCount);
// var_dump($salaryRange);
// var_dump($locationCount);
// var_dump($postalCodeMin);
// var_dump($postalCodeMax);
// var_dump($fileType);


// 必須パラメータの確認
if (is_null($employeeCount) || is_null($salaryRange) || is_null($locationCount) || 
    is_null($postalCodeMin) || is_null($postalCodeMax) || is_null($fileType)) {
    exit('Missing parameters.');
}

if (!is_numeric($employeeCount) || $employeeCount < 1 || $employeeCount > 100) {
    exit('Invalid employeeCount. Must be a number between 1 and 100.');
}

if (!is_numeric($locationCount) || $locationCount < 1 || $locationCount > 100) {
    exit('Invalid locationCount. Must be a number between 1 and 100.');
}


// ユーザーを生成
// TODO createEmployeesで指定数の従業員を生成する
$restaurantChains = RandomGenerator::createRestaurantChains(
    $min,
    $max,
    $employeeCount,
    $salaryRange,
    $locationCount,
    $postalCodeMin,
    $postalCodeMax,
);

// TODO オブジェクトは良い感じに生成できているのであとは以下のタスク
// 1. json形式で出力できるようにする
// 2. TXT形式で出力できるようにする
// 3. 新たなオブジェクト構造でmain.phpを出力する
var_dump($restaurantChains);
exit;

if ($format === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($users as $user) {
        echo $user->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    $usersArray = array_map(fn($user) => $user->toArray(), $users);
    echo json_encode($usersArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($users as $user) {
        echo $user->toString();
    }
} else {
    // HTMLをデフォルトに
    header('Content-Type: text/html');
    
    include "main.php";
}