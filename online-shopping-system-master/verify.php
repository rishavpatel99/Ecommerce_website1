<?php
require('config.php');

$keySecret = "RswtYn3yL1TR0RRC2u2CwEdf";

$payment_id = $_POST['razorpay_payment_id'];
$order_id = $_POST['razorpay_order_id'];
$signature = $_POST['razorpay_signature'];

$generated_signature = hash_hmac(
    'sha256',
    $order_id . "|" . $payment_id,
    $keySecret
);

if ($generated_signature == $signature) {

    // ✅ Payment successful
    // Save to DB

    echo "Payment Verified";

} else {
    echo "Payment Failed";
}

mysqli_query($conn, "
INSERT INTO payments (order_id, payment_id, amount, status)
VALUES ('$order_id', '$payment_id', '$amount', 'success')
");