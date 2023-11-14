<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;
use Faker\Factory;


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "POST通信以外受け付けません";
    exit();
}

// POSTリクエストからパラメータを取得
$employeeCount = (int)$_POST['employeeCount'] ?? 3;
$salaryRange = (int)$_POST['salaryRange'] ?? 30000;
$locationCount = (int)$_POST['locationCount'] ?? 3;
$postalCodeMin = $_POST['postalCodeMin'] ?? "000-0000";
$postalCodeMax = $_POST['postalCodeMax'] ?? "999-9999";
$fileType = $_POST['fileType'] ?? "html";


var_dump($employeeCount);
var_dump($salaryRange);
var_dump($locationCount);
var_dump($postalCodeMin);
var_dump($postalCodeMax);
var_dump($fileType);


// パラメータが正しい形式であることを確認
$count = (int)$count;

if (is_null($count) || is_null($format)) {
    exit('Missing parameters.');
}

if (!is_numeric($count) || $count < 1 || $count > 100) {
    exit('Invalid count. Must be a number between 1 and 100.');
}


// ユーザーを生成
$users = RandomGenerator::users($count, $count);

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
    foreach ($users as $user) {
        echo $user->toHTML();
    }
}