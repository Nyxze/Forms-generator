<?php

require "vendor/autoload.php";
use dbGenerator\Table;
use dbGenerator\FormGenerator;
use dbGenerator\TableFactory;


$pdo = new PDO ("mysql:host=localhost;dbname=formation_cda_2022;charset=utf8","root","",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

$allTable = $pdo->query("SHOW TABLES")->fetchAll();

$factory = new TableFactory($pdo);
// $table = $factory->makeTable("livres");
// $form = new FormGenerator($table);

foreach($allTable as $name){
    $table = $factory->makeTable($name[0]);
    $form = new FormGenerator($table);
    echo $form->save();
    var_dump($name);
}
$allTable = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo $form->render()
    
    ?>
</body>
</html>

