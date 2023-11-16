<?php
// // コードベースのファイルのオートロード
// spl_autoload_extensions(".php"); 
// spl_autoload_register();

// use Helpers\RandomGenerator;
// use Models\Employee;

// // composerの依存関係のオートロード
// require_once 'vendor/autoload.php';

// // クエリ文字列からパラメータを取得
// $min = $_GET['min'] ?? 3;
// $max = $_GET['max'] ?? 5;

// // パラメータが整数であることを確認
// $min = (int)$min;
// $max = (int)$max;


// // 会社とそのチェーン店配列を取得
// $companiesRestaurantChains = RandomGenerator::createCompaniesRestaurantChains($min, $max);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/style.css">
    <style>
        
    </style>
</head>

<body class="bg-light">

    <?php $index = 0 ?>
    <div class="container mt-5">
        <?php foreach ($restaurantChains as $chainIndex => $chain): ?>
            <div class="container custom-container">
                <h2 class="mb-3 text-center">
                    <?php echo $chain->getName(); ?>
                </h2>

                <div class="container bg-primary p-3">
                    <h4 class="accordion-header">Restaurant Chain Information</h4>
                </div>

                <?php
                $locations = $chain->getRestaurantLocations();
                foreach ($locations as $location):
                    $index++;
                ?>
                    <div class="accordion accordion-flush" id="accordionFlush<?php echo $index; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $index; ?>" aria-expanded="false" aria-controls="flush-collapseOne<?php echo $index; ?>">
                                    <?php echo "<p>" . $location->getName() . "</p>"; ?>
                                </button>
                            </h2>
                            <div id="flush-collapseOne<?php echo $index; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlush<?php echo $index; ?>">
                                <div class="accordion-body">
                                    <?php echo $location->toHTML(); ?>
                                    <div class="custom-border-bottom"></div>
                                    <h5>Employees:</h5>
                                    <?php foreach ($location->getEmployees() as $employee): ?>
                                        <div class="container">
                                            <table class="table custom-border">
                                                <tbody>
                                                <tr>
                                                    <td class="table-secondary"><?php echo $employee->toHTML(); ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <!--  Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>