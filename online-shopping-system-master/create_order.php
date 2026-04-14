<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$keyId = "rzp_test_Sbu4puTfZXI9y9";
$keySecret = "RswtYn3yL1TR0RRC2u2CwEdf"; // ⚠️ replace this

if (!isset($_POST['amount'])) {
    echo json_encode(["error" => "Amount missing"]);
    exit();
}

$amount = $_POST['amount'] * 100;

$data = [
    "amount" => $amount,
    "currency" => "INR",
    "receipt" => "order_" . rand(1000,9999)
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $keyId . ":" . $keySecret);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode(["error" => curl_error($ch)]);
    exit();
}

echo $response;