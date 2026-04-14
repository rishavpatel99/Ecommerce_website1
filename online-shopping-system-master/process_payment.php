<?php
$method = $_GET['method'];

echo "<h2>Payment Method Selected: " . $method . "</h2>";

// Here you can integrate real payment gateway later
echo "<p>Processing Payment...</p>";

// Example success redirect
echo "<a href='success.php'>Click to Complete Payment</a>";
?>