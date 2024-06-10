<?php
function distributeRupees($totalAmount, $numberOfPeople, $maxAmountPerPerson) {
    // Initialize variables
    $amountPerPerson = 0;
    $remainingAmount = 0;

    // Check if the total amount is greater than 0
    if ($totalAmount > 0) {
        // Check if the number of people is greater than 0
        if ($numberOfPeople > 0) {
            // Calculate the maximum amount each person can receive
            $maxAmountPerPerson = min($maxAmountPerPerson, $totalAmount / $numberOfPeople);

            // Calculate the amount each person will get
            $amountPerPerson = round($maxAmountPerPerson, 2);

            // Calculate the remaining amount
            $remainingAmount = round($totalAmount - ($amountPerPerson * $numberOfPeople), 2);
        } else {
            echo "Number of people should be greater than 0.";
        }
    } else {
        echo "Total amount should be greater than 0.";
    }

    // Display the amount each person will get
    echo "Amount per person: " . $amountPerPerson . " rupees.<br>";

    // Return the remaining amount
    return $remainingAmount;
}

// Example usage
$totalAmount = 1000;
$numberOfPeople = 5;
$maxAmountPerPerson = 300;

$remainingAmount = distributeRupees($totalAmount, $numberOfPeople, $maxAmountPerPerson);
// Iss example mein $remainingAmount ki value 0 hogi, kyunki humne total amount se har individual 
// ka diya gaya amount subtract kiya hai. Agar result positive hota, toh yeh indicate karta ki kuch 
// amount remaining hai. Agar negative hota, toh iska matlab hai ki extra amount di gayi hai.

echo "Remaining amount: " . $remainingAmount . " rupees.";
?>
