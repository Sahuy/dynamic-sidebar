<?php
function getAmountBeforeTax($inclusiveAmount, $taxRate) {
    // Check if tax rate is between 0 and 100
    if ($taxRate >= 0 && $taxRate <= 100) {
        // Calculate the original amount before tax
        $originalAmount = $inclusiveAmount / (1 + ($taxRate / 100));

        // Return the original amount
        return $originalAmount;
    } else {
        // If tax rate is not valid, return an error message
        return "Invalid tax rate. Tax rate should be between 0 and 100.";
    }
}

// Example usage
$inclusiveAmount = 100; // Total amount inclusive of tax
$taxRate = 29; // Tax rate in percentage

$originalAmount = getAmountBeforeTax($inclusiveAmount, $taxRate);

if (is_numeric($originalAmount)) {
    echo "Original amount before tax: " . $originalAmount . " rupees.";
} else {
    echo $originalAmount;
}
?>
