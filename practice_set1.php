<?php
/**
 * Calculate the total price of items in a shopping cart.
 *
 * @param array $items An array of items with 'name' and 'price' keys.
 *
 * @return float The total price of all items.
 */
function Total_Price(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Remove spaces and convert to lowercase for a given string.
 *
 * @param string $input_string The input string to be modified.
 *
 * @return string The modified string.
 */
function ManipulateString(string $input_string): string {
    $string = str_replace(' ', '', $input_string);
    $string = strtolower($string);
    return $string;
}

/**
 * Check if a number is even or odd.
 *
 * @param int $number The number to check.
 *
 * @return string The result message indicating if the number is even or odd.
 */
function check_even_or_odd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

$items = [
    ['name' => 'Box', 'price' => 100],
    ['name' => 'Case', 'price' => 150],
    ['name' => 'Charger', 'price' => 290],
];

$total = Total_Price($items);
echo "Total price: $" . $total;

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = ManipulateString($string);
echo "\nModified string: " . $modifiedString;

$number = 79;
$resultMessage = check_even_or_odd($number);
echo "\n$resultMessage";
?>
