<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;
use Helpers\DrawHelper;
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


// チェーン店を生成
$restaurantChains = RandomGenerator::createRestaurantChains(
    $min,
    $max,
    $employeeCount,
    $salaryRange,
    $locationCount,
    $postalCodeMin,
    $postalCodeMax,
);

if ($fileType === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    DrawHelper::drawMarkdown($restaurantChains);
} elseif ($fileType === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    DrawHelper::drawJson($restaurantChains);
} elseif ($fileType === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    DrawHelper::drawText($restaurantChains);
} else {
    header('Content-Type: text/html');

    include "main.php";
}