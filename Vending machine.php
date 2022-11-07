<?php

$clientMoney = 5;

$moneyValues = [2, 1, 0.5, 0.2, 0.1, 0.5, 0.02, 0.01];
$coke = new stdClass();
$coke -> name = "coke";
$coke -> price = 2.57;

$twix = new stdClass();
$twix -> name = "twix";
$twix -> price = 1;

$lays = new stdClass();
$lays -> name = "lays";
$lays -> price = 3;

$products = [
    $coke,
    $lays,
    $twix
];

$moneyInStock = ["200" => 2, "100" => 3, "50" => 6, "20" => 7, "10" => 8, "5" => 9, "2" => 10, "1" => 0];

foreach ($products as $key => $product){
    echo "$key - $product->name: $product->price EUR" . PHP_EOL;
}

$userInput = readline("Please select a product: ");

$customerCash = 0;


$remainder = $products[$userInput]->price * 100;

while ($customerCash <= $remainder){
    $moneyReceived = intval(readline("Insert coins > we accept (2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01) ")) * 100;
    $moneyInStock[$moneyReceived]++;
    $customerCash += $moneyReceived;
}

$customerCash -= $remainder;



foreach ($moneyInStock as $coin => $amount){

    $times = intdiv($customerCash, intval($coin)) ;
    if ($times  > 0 && $amount > 0){
        echo "Your change " . $coin / 100 . " EUR X " . $times . PHP_EOL;
        $moneyInStock[$coin] -= $times;
        $customerCash -= $coin * $times;
    }



    if ($customerCash <= 0){
        break;
    }
}

if ($customerCash > 0){
    echo " We dont have change";
}